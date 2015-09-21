<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new AdministradorDao();
	$busqueda=new Administrador();
	$admin=new Administrador();
	$busqueda->setIdAdministrador($_SESSION["ID"]);
	$list=$adao->searchMatching($conn,$busqueda);
	$admin=$list[0];
	$contAntiguaForm=$_POST["conAntigua"];
	if($contAntiguaForm==$admin->getPassword())
	{
		$admin->setPassword($_POST["conNueva"]);
		if($adao->save($conn,$admin))
		{
			?>
				<script type="text/javascript">
					alert("Contrase\u00f1a cambiada exitosamente");
				</script>
				<META HTTP-EQUIV="REFRESH" CONTENT="0,url=../Interfaces/admon.php">	
			<?php
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("Error actualizando. Por favor contacte al administrador del sistema");
				</script>
				<META HTTP-EQUIV="REFRESH" CONTENT="0,url=../Interfaces/cambiarContrasena.php">	
			<?php
		}
	}
	else
	{
		?>
			<script type="text/javascript">
				alert("La contrase\u00f1a introducida no es correcta. Intente de nuevo");
			</script>
			<META HTTP-EQUIV="REFRESH" CONTENT="0,url=../Interfaces/cambiarContrasena.php">
		<?php
	}
?>