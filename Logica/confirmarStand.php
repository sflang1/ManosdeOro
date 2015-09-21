<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/SolicitudDao.php");
	include_once("../Librerias/Solicitud.php");
	include_once("../Librerias/StandDao.php");
	include_once("../Librerias/Stand.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$adao=new ArtesanoDao();
	$sdao=new SolicitudDao();
	$standDao=new StandDao();
	$idSolicitud=$_GET["id"];
	$solicitud=$sdao->getObject($conn,$idSolicitud);
	$stand=$standDao->getObject($conn,($solicitud->getIdstand()));
	$stand->setReservado(1);
	$stand->setIdartesano($solicitud->getIdartesano());
	if($standDao->save($conn,$stand))
	{
		$busqueda=new Solicitud();
		$busqueda->setIdstand($solicitud->getIdstand());
		$lista=$sdao->searchMatching($conn,$busqueda);
		$errores=false;
		for($i=0;$i<count($lista);$i++)
		{
			if(!$sdao->delete($conn,$lista[$i]))
			{
				$errores=true;
				break;
			}
		}
		if($errores)
		{
			$res = array('exito' => 0,'causa'=>utf8_encode('Error borrando las demás solicitudes') );
			echo(json_encode($res));
		}
		else
		{
			$res = array('exito' => 1 );
			echo(json_encode($res));
			
		}
	}
	else
	{
		$res = array('exito' => 0,'causa'=>utf8_encode('Error reservando el Stand') );
		echo(json_encode($res));
	}
?>