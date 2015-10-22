<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/CursosDao.php");
	include_once("../Librerias/Cursos.php");
	include_once("../Librerias/Variables.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/ArtesanoDao.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$cdao=new CursosDao();
	$adao=new ArtesanoDao();
	$cursos=new Cursos();
	$cursos->setFecha_lim($_POST["fecha"]);
	$cursos->setDescripcion($_POST["descripcion"]);
	$cursos->setHorario($_POST["horario"]);
	$dirfoto=$_FILES["foto"]["tmp_name"];
	$formatofoto=substr($_FILES["foto"]["name"], strrpos($_FILES["foto"]["name"], ".") );  //Obtener la última aparición del punto y por consiguiente, el formato
	$destinofoto=$filelocation."/fotoCurso".$_POST["descripcion"].$formatofoto;
	$cursos->setFoto("fotoCurso".$_POST["descripcion"].$formatofoto);
	$correcto=true;
	if(!move_uploaded_file($dirfoto, $destinofoto))
	{	
		?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/agregarCurso.php">
			<script type="text/javascript">
				alert("Error subiendo los archivos");
				</script>
		<?php
	}
	else
	{
		if($cdao->create($conn,$cursos))
		{
			$artesanos=$adao->loadAll($conn);
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$asunto="Nueva capacitación: ".$_POST['descripcion'];
			//for($i=0;count($artesanos);$i++)
			// {
			//	$mensaje="Estimad@ ".$artesanos[$i]->getNombre().":<br>Se te informa que Manos de Oro abrió la inscripción para el curso: ".$_POST['descripcion'].", con el horario: ".$_POST["horario"].". La fecha límite de inscripción es: ".$_POST["fecha"]."<br>Atentamente,<br>Artesanías Manos de Oro";
			//	mail($artesanos[$i]->getEmail(), $asunto, $mensaje,$cabeceras);
				
			//}
			?>
			<script type="text/javascript">
				alert("Curso creado exitosamente");
			</script>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
			<?php	
		}
		else
		{
			?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/agregarCurso.php">
			<script type="text/javascript">
				alert("Error actualizando la B.D");
			</script>
			<?php		
		}
	}
?>