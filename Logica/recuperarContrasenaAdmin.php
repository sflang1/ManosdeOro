<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$admDao=new AdministradorDao();
	$username=$_POST["username"];
	$busqueda=new Administrador();
	$busqueda->setUsername($username);
	$lista=$admDao->searchMatching($conn,$busqueda);
	if(count($lista)==0)
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/recuperarContrasenaAdmin.php">
		<script type="text/javascript">
			alert("No existe ese username. Intenta de nuevo");
		</script>
		<?php
	}
	else
	{
		$administrador=$lista[0];
		$destino=$administrador->getEmail();
		$cadena="Solicitaste que se te devolviera tu contraseña. La contraseña que tienes actualmente es: ".$administrador->getPassword()."<br>Atentamente,<br>Artesanías Manos de Oro";
    	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		if(mail($destino, "Recuperación de la contraseña - Manos de Oro", $cadena,$cabeceras))
		{
			?>
				<meta http-equiv="REFRESH" content="0,url=../Interfaces">
				<script type="text/javascript">
					alert("El correo fue enviado");
				</script>
			<?php
		}
		else
		{
			?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/recuperarContrasenaAdmin.php">
			<script type="text/javascript">
				alert("Error enviando el correo");
			</script>
			<?php
		}
	}
?>