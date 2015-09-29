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

	$cadena="Se ha enviado un registro a un curso, con la siguiente informacion:<br>curso: ".$curso."<br>Nombre: ".$nombre."<br>Cedula: ".$cedula."<br>Email de contacto: ".$email."<br>Celular: ".$celular."<br>Direccion: ".$direccion."<br>Ciudad: ".$ciudad.",<br><br><br> Usuario nuevo que esta intersado en ingresar al curso, Revisar informacion, ya que no ha hecho el registro como artesano";
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

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

	if(mail("manosdeoro@dstec.co","Correo enviado al Contacto de Manos de Oro",$cadena,$cabeceras))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
		<script type="text/javascript">
			alert("Inscrito Correctamente, Nos Pondremos en Contacto con Usted. Gracias");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
		<script type="text/javascript">
			alert("No se Pudo Enviar tu Inscripcion");
		</script>
		<?php
	}
?>