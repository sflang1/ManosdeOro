<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ndao=new NoticiasDao();
	$id=$_POST['id'];
	$noticia=$ndao->getObject($conn,$id);
	if($ndao->delete($conn,$noticia))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/admon.php">
		<script type="text/javascript">
			alert("Noticia exitosamente eliminada");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/eliminarNoticia.php">
		<script type="text/javascript">
			alert("La noticia no pudo ser eliminada");
		</script>
		<?php	
	}
?>