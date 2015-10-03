<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$artesano=$adao->getObject($conn,$_POST["id"]);
	if($artesano->getPassword()==$_POST["oPassword"])
	{
		$artesano->setPassword($_POST["nPassword"]);
		if($adao->save($conn,$artesano))
		{
			?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0, url=../Interfaces/principal.php">
			<script type="text/javascript">
				alert("Contrase\u00f1a cambiada exitosamente");
			</script>
			<?php
		}	
		else
		{
			?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0, url=../Interfaces/cambiarContrasenaArtesano.php">
			<script type="text/javascript">
				alert("Error cambiando contrase\u00f1a");
			</script>
			<?php
		}	
	}
	else
	{
		?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0, url=../Interfaces/cambiarContrasenaArtesano.php">
			<script type="text/javascript">
				alert("La contrase\u00f1a antigua no es correcta");
			</script>
		<?php
	}
?>