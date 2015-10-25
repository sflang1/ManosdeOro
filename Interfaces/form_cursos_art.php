<?php
	include_once("../Librerias/Datasource.php");	
	include_once("../Librerias/DepartamentoDao.php");
	include_once("../Librerias/Departamento.php");
	include_once("../Librerias/Municipio.php");
	include_once("../Librerias/MunicipioDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ddao=new DepartamentoDao();
	$mdao=new MunicipioDao();
	$depto=$ddao->getObject($conn,$_GET["departamento"]);
	$mpio=$mdao->getObject($conn,$_GET["ciudad"]);
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
		<div id="contenedor2" style="margin-bottom: 40px;">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
			<section id="sec3">
<div style="padding: 10px; float: left; width: 35%; text-align: justify;">
					<center>
						<img id="logo2" src="../imgs/logo2.png">
					</center>
				</div>
<form method="POST" action="../Logica/agregarInscrito.php">
				<div style="float: right; width: 60%;">
			<h1 id="titulos_contacto">Regristro Cursos C.D.A</h1>
			<h1 id="titulos_noti">Registro al curso: </h1>
			<tr><td> <input value="<?php echo($_GET["nomCurso"]);?>" id="input_txt" name='curso' readonly ></td></tr>
			<h1 id="strings_contacto">Una vez definido los asistentes de Nuestro Curso, Nos contactaremos con Usted</h1>
		
			<center>
			<table>
			<tr><td><h1 id="titulos_noticias">Nombre Completo</h1><td></tr>
			<tr><td> <input value="<?php echo($_GET["nombre"]);?>" placeholder="Nombre Completo" id="input_txt" type='text' name='nombre' required></td></tr>
			<tr><td><h1 id="titulos_noticias">Cedula</h1><td></tr>
			<tr><td> <input value="<?php echo($_GET["cedula"]);?>" placeholder="Cedula" id="input_txt" type='text' name='cedula' required></td></tr>
			<tr><td><h1 id="titulos_noticias">Email</h1><td></tr>
			<tr><td> <input value="<?php echo($_GET["email"]);?>" placeholder="email" id="input_txt" type='email' name='email' required></td></tr>
			<tr><td><h1 id="titulos_noticias">Celular</h1><td></tr>
			<tr><td> <input value="<?php echo($_GET["celular"]);?>" placeholder="Celular" id="input_txt" type='text' name='celular' required></input></td></tr>
			<tr><td><h1 id="titulos_noticias">Direccion</h1><td></tr>
			<tr><td> <input value="<?php echo($_GET["direccion"]);?>" placeholder="Direccion" id="input_txt" type='text' name='direccion' required></input></td></tr>
			<tr><td><h1 id="titulos_noticias">Ciudad</h1><td></tr>
			<tr><td> <input value="<?php echo($mpio->getDescripcion());?>" placeholder="Ciudad" id="input_txt" type='text' name='ciudad' required></input></td></tr>
			<tr><td><h1 id="titulos_noticias">Departamento</h1><td></tr>
			<tr><td> <input value="<?php echo $depto->getDescripcion();?>" placeholder="Departamento" id="input_txt" type='text' name='departamento' required></input></td></tr>
			<tr><td colspan='2'></td></tr>			
			</table>
			<input type='submit' id="boton_enviar" value='Enviar Registro'>
			</center>
		</form>
				</div>
			</section>
		</div>
	</body>	
</html>