<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new AdministradorDao();
	$adminborrado=new Administrador();
	$adminborrado->setIdAdministrador($_GET["idAdmin"]);
	if($adao->delete($conn,$adminborrado))
	{
		$exito=1;
	}
	else
	{
		$exito=0;
	}
	$lista=$adao->loadAll($conn);
	$array4 = array();
	$cadena="";
	for($i=0;$i<count($lista);$i++)
	{
		$admin=$lista[$i];
		$array2 = array('idAdmin'=>$admin->getIdAdministrador(),'primerNom' => utf8_encode($admin->getPrimerNom()),'segundoNom'=>utf8_encode($admin->getSegundoNom()),'primerApe'=>utf8_encode($admin->getPrimerApe()),'segundoApe'=>utf8_encode($admin->getSegundoApe()),'username'=>$admin->getUsername(),'email'=>$admin->getEmail());
		$array4[]=$array2;
		//echo(json_last_error_msg()."<br>");
	}
	$res['exito']=$exito;
	$res['valores']=$array4;
	echo(json_encode($res));
?>