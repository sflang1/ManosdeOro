<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$username=$_POST["username"];
	$password=$_POST["password"];
	$abusqueda=new Artesano();
	$abusqueda->setUsername($username);
	$list=$adao->searchMatching($conn,$abusqueda);
	if(count($list)==0)
	{
		?>
		<script type="text/javascript">
			alert("No existe este usuario");
		</script>
		<Meta http-equiv="refresh" content="0,url=../Interfaces/expositores.php">
		<?php
	}
	else
	{
		$aobtenido=$list[0];
		if($password!=$aobtenido->getPassword())
		{
			?>
			<script type="text/javascript">
				alert("Contrase\u00F1a incorrecta");
			</script>
			<Meta http-equiv="refresh" content="0,url=../Interfaces/expositores.php">
			<?php
		}
		else
		{
			$_SESSION['USER']=$aobtenido;
			$_SESSION["ID"]=$aobtenido->getIdArtesano();
			$_SESSION["ROL"]="Artesano";
			?>
			<script type="text/javascript">
				alert("Autenticaci\u00F3n exitosa");
			</script>
			<Meta http-equiv="refresh" content="0,url=../Interfaces/principal.php">
			<?php
		}
	}
?>