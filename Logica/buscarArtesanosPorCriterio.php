<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Variables.php");
	$criterio=$_GET["criterio"];
	$busqueda=$_GET["busqueda"];
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	switch ($criterio) {
		case 1:
			$lista=$adao->buscarArtesanoPorCedula($conn,$busqueda);
			break;
		case 2:
			# ciudad
			break;
		case 3:
			$busqueda=utf8_decode(mb_strtoupper($busqueda,"utf-8"));
			$lista=$adao->buscarArtesanoPorNombre($conn,$busqueda);	
			break;
		default:
			# code...
			break;
	}
	$array1=array();
	for($i=0;$i<count($lista);$i++)
	{
		$artesano=$lista[$i];
		$array2 = array('idArtesano'=>$artesano->getIdArtesano(),'nombre' => utf8_encode($artesano->getNombre()),'nroDoc'=>$artesano->getNroDoc(),'direccion'=>utf8_encode($artesano->getDireccion()),'telefono'=>$artesano->getTelefono(),'celular'=>$artesano->getCelular(),'email'=>$artesano->getEmail());
		$array1[]=$array2;
	}
	$array3["exito"]=1;
	$array3["valores"]=$array1;
	echo json_encode($array3);
?> 