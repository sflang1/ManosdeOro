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
<!DOCTYPE html>
<html>
	<head>
		<title>Manos de Oro - Contacto</title>
		<link rel="apple-touch-icon" sizes="57x57" href="../imgs/icono/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="../imgs/icono/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="../imgs/icono/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="../imgs/icono/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="../imgs/icono/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="../imgs/icono/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="../imgs/icono/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="../imgs/icono/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../imgs/icono/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="../imgs/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../imgs/icono/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../imgs/icono/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../imgs/icono/favicon-16x16.png">
		<meta name="msapplication-TileImage" content="../imgs/icono/ms-icon-144x144.png">
		<meta http-equiv="Content-Type" Content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="../css/diseno.css">
		<script type="text/javascript" src="../js/re_dir.js"></script>
	</head>
	<body>
		<div id="contenedor2">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
			<section id="sec5">
				<div style="padding: 10px; float: left; width: 35%; text-align: justify;">
					<center>
						<img id="logo2" src="../imgs/logo2.png">
					</center>
				</div>

				<div style="float: right; width: 60%;">
					<form method="POST" action="../Logica/autenticaradmin.php">
					<h1 id="titulos_inicio_sesion">Iniciar Sesion - Administrador </h1>
					<input type="text" name="username" placeholder="Usuario" id="input_txt_expo" required/>
					<br>
					<input type="password" name="password" placeholder="Contraseña" id="input_txt_expo" required/>
					<button type="submit" id="boton_iniciar" ><img id="logo_btn" src="../imgs/logo.png">Iniciar</button>
					</form>
					<h1 id="creatucuenta">Olvidaste Tu Contraseña. Recuperala</h1><a href="recuperarContrasenaAdmin.php" id="aqui">aquí</a>
					<br><br>
				</div>
			</section>
		</div>
	</body>	
</html>