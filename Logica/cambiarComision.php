<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$ndao=new NoticiasDao();
	$comision=$ndao->getObject($conn,-1);
	$nuevacomision=$_POST["comision"];
	$comision->setContenido($nuevacomision);
	if($ndao->save($conn,$comision))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/admon.php">
		<script type="text/javascript">
			alert("Comisi\u00f3n cambiada exitosamente");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/cambiarComision.php">
		<script type="text/javascript">
			alert("No se ha cambiado la comisi\u00f3n");
		</script>
		<?php
	}
?>