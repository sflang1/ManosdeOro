<?php
	@session_start();
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]=="Artesano")
		{
			?>
			<meta http-equiv="refresh" content="0,url=principal.php">
			<?php
		}
		if($_SESSION["ROL"]=="Administrador")
		{
			?>
			<meta http-equiv="refresh" content="0,url=admon.php">
			<?php
		}
		if($_SESSION["ROL"]=="Administrador de tienda")
		{
			?>
			<meta http-equiv="refresh" content="0,url=admonTienda.php">
			<?php
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>Autenticación de administradores</title>
	</head>
	<body>
		Login para administradores. Por favor, ingresa tu nombre de usuario y tu contraseña
					<form method="POST" action="../Logica/autenticaradmin.php">
					<h1 id="titulos_inicio_sesion">Iniciar Sesion - Administrador </h1>
					<input type="text" name="username" placeholder="Usuario" id="input_txt_expo" required/>
					<br>
					<input type="password" name="password" placeholder="Contraseña" id="input_txt_expo" required/>
					<button type="submit" id="boton_iniciar" ><img id="logo_btn" src="../imgs/logo.png">Iniciar</button>
					</form>
		¿Olvidaste tu contraseña? Haz click para recuperarla <a href="recuperarContrasenaAdmin.php">aquí</a>
	</body>
</html>