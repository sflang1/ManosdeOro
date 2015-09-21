<?php
	$nombre=$_POST["nombre"];
	$email=$_POST["email"];
	$mensaje=$_POST["mensaje"];
	$cadena="Se ha enviado una duda.<br>Información:<br>Nombre: ".$nombre."<br>Email de contacto: ".$email."<br>Inquietud: ".$mensaje."<br>Atentamente,<br>Artesanías Manos de Oro";
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