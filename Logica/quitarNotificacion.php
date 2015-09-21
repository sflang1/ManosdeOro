<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$id=$_GET["id"];
	$pdao=new ProductoDao();
	$producto=$pdao->getObject($conn,$id);
	$producto->setNotificado(1);
	if($pdao->save($conn,$producto))
	{
		$res = array('exito' => 1 );
	}
	else
	{
		$res = array('exito' => 0 );	
	}
	echo(json_encode($res));
?>