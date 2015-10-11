<?php
	include_once("../Librerias/Datasource.php");	
	include_once("../Librerias/Departamento.php");
	include_once("../Librerias/DepartamentoDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ddao=new DepartamentoDao();
	$lista=$ddao->loadAll($conn);
	$array1=array();
	for($i=0;$i<count($lista);$i++)
	{
		$municipio=$lista[$i];
		$array2 = array('idDpto'=>$municipio->getId_departamento(),'descripcion' => utf8_encode($municipio->getDescripcion()));
		$array1[]=$array2;
	}
	$array3["exito"]=1;
	$array3["valores"]=$array1;
	echo json_encode($array3);
?>