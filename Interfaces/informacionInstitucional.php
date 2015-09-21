<!DOCTYPE HTML>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>Información institucional</title>
	</head>
	<body>
<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	?>
	
	
	<?php
	$ndao=new NoticiasDao();
	$somos=$ndao->getObject($conn,1);
	$mision=$ndao->getObject($conn,2);
	$vision=$ndao->getObject($conn,3);
	echo("<h2>".utf8_encode($somos->getTitulo())."</h2><h3>".$somos->getContenido()."</h3>");
	echo("<h2>".utf8_encode($mision->getTitulo())."</h2><h3>".$mision->getContenido()."</h3>");
	echo("<h2>".utf8_encode($vision->getTitulo())."</h2><h3>".$vision->getContenido()."</h3>");
	?>
	</body>
	</html>