<?php
	$curso=$_POST["curso"];
	$nombre=$_POST["nombre"];
	$cedula=$_POST["cedula"];
	$email=$_POST["email"];
	$mensaje=$_POST["mensaje"];
	$direccion=$_POST["direccion"];
	$ciudad=$_POST["ciudad"];

	$cadena="Se ha enviado un registro a un curso, con la siguiente informacion:<br>curso: ".$curso."<br>Nombre: ".$nombre."<br>Cedula: ".$cedula."<br>Email de contacto: ".$email."<br>Celular: ".$mensaje."<br>Direccion: ".$direccion."<br>Ciudad: ".$ciudad.",<br><br><br> Artesano que ya se encuentra en nuestra base de datos, con productos aprobados.";
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	if(mail("manosdeoro@dstec.co","Correo enviado al Contacto de Manos de Oro",$cadena,$cabeceras))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
		<script type="text/javascript">
			alert("Correo correctamente enviado");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php">
		<script type="text/javascript">
			alert("No se pudo enviar tu correo");
		</script>
		<?php
	}

?>