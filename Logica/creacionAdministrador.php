<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new AdministradorDao();
	$admin=new Administrador();
	$admin->setPrimerNom(utf8_decode($_GET["primerNom"]));
	$admin->setSegundoNom(utf8_decode($_GET["segundoNom"]));
	$admin->setPrimerApe(utf8_decode($_GET["primerApe"]));
	$admin->setSegundoApe(utf8_decode($_GET["segundoApe"]));
	$username=utf8_decode($_GET["username"]);
	$password=utf8_decode($_GET["password"]);
	$email=utf8_decode($_GET["email"]);
	$perfil=$_GET["tipo"];
	$admin->setUsername($username);
	$admin->setPassword($password);
	$admin->setEmail($email);
	$admin->setTipo($perfil);
	if($adao->create($conn,$admin))
	{
		$res = array('exito' => 1 );
	}
	else
	{
		$res = array('exito' => 0 );
	}
	echo(json_encode($res));
?>