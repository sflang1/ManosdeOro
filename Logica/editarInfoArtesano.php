<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$id=$_POST["id"];
	$artesano=$adao->getObject($conn,$id);
	$nombres=explode(" ", $artesano->getNombre());
	$primernom=$nombres[0];
	$segundonom=$nombres[1];
	$primerape=$nombres[2];
	$segundoape=$nombres[3];
	if(strlen($_POST["primerNom"])>0)
	{
		$primernom=utf8_decode($_POST["primerNom"]);	
	}
	if(strlen($_POST["segundoNom"])>0)
	{
		$segundonom=utf8_decode($_POST["segundoNom"]);	
		$segundonom=str_replace("", "\b", $segundonom);
	}
	if(strlen($_POST["primerApe"])>0)
	{
		$primerape=utf8_decode($_POST["primerApe"]);	
	}
	if(strlen($_POST["segundoApe"])>0)
	{
		$segundoape=utf8_decode($_POST["segundoApe"]);	
		$segundoape=str_replace("", "\b", $segundoape);
	}
	$nombre=$primernom." ".$segundonom." ".$primerape." ".$segundoape;
	$artesano->setNombre($nombre);
	if(strlen($_POST["direccion"])!=0)
	{
		$artesano->setDireccion($_POST["direccion"]);
	}
	if(strlen($_POST["telefono"])!=0)
	{
		$artesano->setTelefono($_POST["telefono"]);
	}
	if(strlen($_POST["telefono2"])!=0)
	{
		$artesano->setTelefono2($_POST["telefono2"]);
	}
	if(strlen($_POST["celular"])!=0)
	{
		$artesano->setCelular($_POST["celular"]);
	}
	if(strlen($_POST["email"])!=0)
	{
		$artesano->setEmail($_POST["email"]);
	}
	if(strlen($_POST["contrasena"])!=0)
	{
		$artesano->setPassword($_POST["contrasena"]);
	}
	$artesano->setNombre($nombre);
	if($adao->save($conn,$artesano))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/principal.php">
		<script type="text/javascript">
			alert("Datos exitosamente cambiados");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/editarInfoArtesano.php">
		<script type="text/javascript">
			alert("Error cambiando los datos");
		</script>
		<?php
	}
?>