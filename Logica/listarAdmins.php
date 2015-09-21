<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new AdministradorDao();
	$lista=$adao->loadAll($conn);
	$array4 = array();
	$cadena="";
	$array1 = array('exito' => 1 );
	
	for($i=0;$i<count($lista);$i++)
	{
		$admin=$lista[$i];
		$array2 = array('idAdmin'=>$admin->getIdAdministrador(),'primerNom' => utf8_encode($admin->getPrimerNom()),'segundoNom'=>utf8_encode($admin->getSegundoNom()),'primerApe'=>utf8_encode($admin->getPrimerApe()),'segundoApe'=>utf8_encode($admin->getSegundoApe()),'username'=>$admin->getUsername(),'email'=>$admin->getEmail());
		$array4[]=$array2;
		//echo(json_last_error_msg()."<br>");
	}
	$res= array('exito'=>1,"valores"=>$array4);
	echo(json_encode($res));
?>


