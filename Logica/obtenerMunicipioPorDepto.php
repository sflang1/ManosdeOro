<?php
	include_once("../Librerias/Datasource.php");	
	include_once("../Librerias/Municipio.php");
	include_once("../Librerias/MunicipioDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$mdao=new MunicipioDao();
	$id_dpto=$_GET["id_depto"];
	$busqueda=new Municipio();
	$busqueda->setId_departamento($id_dpto);
	$lista=$mdao->searchMatching($conn,$busqueda);
	$array1=array();
	for($i=0;$i<count($lista);$i++)
	{
		$municipio=$lista[$i];
		$array2 = array('idMpio'=>$municipio->getId_municipio(),'descripcion' => utf8_encode($municipio->getDescripcion()));
		$array1[]=$array2;
	}
	$array3["exito"]=1;
	$array3["valores"]=$array1;
	echo json_encode($array3);
?>