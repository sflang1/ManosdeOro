<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$ndao=new NoticiasDao();
	$titulo=$_POST["titulo"];
	$contenido=$_POST["descripcion"];
	$noticia=new Noticias();
	$noticia->setTitulo($titulo);
	$noticia->setContenido($contenido);
	if($ndao->create($conn,$noticia))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/admon.php">
		<script type="text/javascript">
			alert("Noticia creada");
		</script>
		<?php	
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/admonNoticias.php">
		<script type="text/javascript">
			alert("Error creando la noticia");
		</script>
		<?php
	}
?>