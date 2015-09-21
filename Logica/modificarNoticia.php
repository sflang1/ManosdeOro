<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ndao=new NoticiasDao();
	$id=$_POST['id'];
	$noticia=$ndao->getObject($conn,$id);
	$contenido=$_POST['contenido'];
	$titulo=$_POST['titulo'];
	if(strlen($contenido)!=0)
	{
		$noticia->setContenido(utf8_decode($contenido));
	}
	if(strlen($titulo)!=0)
	{
		$noticia->setTitulo(utf8_decode($titulo));
	}
	if($ndao->save($conn,$noticia))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/admon.php">
		<script type="text/javascript">
			alert("Cambio en la noticia exitoso");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/modificarNoticia.php">
		<script type="text/javascript">
			alert("No se pudo hacer el cambio");
		</script>
		<?php	
	}
?>