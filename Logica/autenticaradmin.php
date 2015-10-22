<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$admDao=new AdministradorDao();
	$username= addslashes($_POST["username"]);
	$password= addslashes($_POST["password"]);
	$abusqueda=new Administrador();
	$abusqueda->setUsername($username);
	$list=$admDao->searchMatching($conn,$abusqueda);
	if(count($list)==0)
	{
		?>
		<script type="text/javascript">
			alert("No existe este usuario");
		</script>
		<Meta http-equiv="refresh" content="0,url=../Interfaces/administracion.php">
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
			<Meta http-equiv="refresh" content="0,url=../Interfaces/administracion.php">
			<?php
		}
		else
		{
			if($aobtenido->getTipo()!=1)
			{
				$_SESSION['USER']=$aobtenido;
				$_SESSION["ID"]=$aobtenido->getIdAdministrador();
				$_SESSION["ROL"]="Administrador";
				?>
				<script type="text/javascript">
					alert("Autenticaci\u00F3n exitosa");
				</script>
				<Meta http-equiv="refresh" content="0,url=../Interfaces/administracion.php">
				<?php
			}
			else
			{
				$_SESSION['USER']=$aobtenido;
				$_SESSION["ID"]=$aobtenido->getIdAdministrador();
				$_SESSION["ROL"]="Administrador de tienda";
				?>
				<script type="text/javascript">
					alert("Autenticaci\u00F3n exitosa");
				</script>
				<Meta http-equiv="refresh" content="0,url=../Interfaces/admonTienda.php">
				<?php	
			}
			
		}
	}
?>