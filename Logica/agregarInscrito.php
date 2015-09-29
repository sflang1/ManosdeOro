<?php
$curso=$_POST["curso"];
$nombre=$_POST["nombre"];
$cedula=$_POST["cedula"];
$email=$_POST["email"];
$celular=$_POST["celular"];
$direccion=$_POST["direccion"];
$ciudad=$_POST["ciudad"];

require_once 'funciones_bd.php';
$db = new funciones_BD();

    if($db->addCurso($curso,$nombre,$cedula,$email,$celular,$direccion,$ciudad)){
    ?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
		<script type="text/javascript">
			alert("Inscrito Correctamente, Nos Pondremos en Contacto con Usted. Gracias");
		</script>

    <?php
    }else{
    ?>

		<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
		<script type="text/javascript">
			alert("No se Pudo Enviar tu Inscripcion");
		</script>

    <?php
    }
echo json_encode($resultado);
	
?>