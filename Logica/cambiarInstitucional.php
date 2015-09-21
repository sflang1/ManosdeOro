<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ndao=new NoticiasDao();
	$somos=$ndao->getObject($conn,1);
	$mision=$ndao->getObject($conn,2);
	$vision=$ndao->getObject($conn,3);
	$cambios=false;
	if(strlen($_POST["somos"])!=0)
	{
		$somos->setContenido($_POST["somos"]);
		$cambios=true;
	}
	if(strlen($_POST["mision"])!=0)
	{
		$mision->setContenido($_POST["mision"]);
		$cambios=true;
	}
	if(strlen($_POST["vision"])!=0)
	{
		$vision->setContenido($_POST["vision"]);
		$cambios=true;
	}
	if($cambios)
	{
		if(($ndao->save($conn,$somos))&&($ndao->save($conn,$mision))&&($ndao->save($conn,$vision)))
		{
			
			?>
			<meta http-equiv="REFRESH" content="0,../Interfaces/admon.php">
			<script type="text/javascript">
				alert("Informaci\u00f3n institucional exitosamente cambiada");
			</script>
			<?php
		}
		else
		{
			?>
			<meta http-equiv="REFRESH" content="0,../Interfaces/cambioInstitucional.php">
			<script type="text/javascript">
				alert("Error cambiando la Informaci\u00f3n institucional");
			</script>
			<?php
		}
	}
	else
	{
		
		?>
			<meta http-equiv="REFRESH" content="0,../Interfaces/admon.php">
			<script type="text/javascript">
				alert("Informaci\u00f3n institucional exitosamente cambiada");
			</script>
		<?php
	}
?>