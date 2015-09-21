<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$artesano=$adao->getObject($conn,$_POST["idArtesano"]);
	$artesano->setNombre($_POST["nom"]);
	$artesano->setDireccion($_POST["direccion"]);
	$artesano->setTelefono($_POST["telefono"]);
	$artesano->setCelular($_POST["celular"]);
	$artesano->setEmail($_POST["email"]);
	if($adao->save($conn,$artesano))
	{
		?>
		<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces/admon.php">
		<script type="text/javascript">
			alert("Artesano cambiado exitosamente");
		</script>
		<?php
	}
	else
	{
		echo("<META HTTP-EQUIV='REFRESH' CONTENT='0,URL=../Interfaces/modificarArtesano.php?idArtesano=".$_POST["idArtesano"]."'>");
		?>
		<script type="text/javascript">
			alert("Error alterando el registro");
		</script>
		<?php
	}
?>