<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$tipoDoc=$_POST["tipo"];
	$docId=$_POST["docId"];
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$adao=new ArtesanoDao();
	$busqueda=new Artesano();
	$busqueda->setTipoDoc($tipoDoc);
	$reemplazar = array("/","-","\\","_"," ",".",",","'");
    $username=str_replace($reemplazar, "", $docId);
    $busqueda->setUsername($username);
    $lista=$adao->searchMatching($conn,$busqueda);
    if(count($lista)==0)
    {
    	?>
    	<meta http-equiv="REFRESH" content="0,url=../Interfaces/recuperarContrasena.php"> 
    	<script type="text/javascript">
    		alert("No se ha encontrado el documento de identidad. Intenta de nuevo");
    	</script>
    	<?php
    }
    else
    {
    	$artesano=$lista[0];
    	$destino=$artesano->getEmail();
    	$cadena="Solicitaste que se te devolviera tu contraseña. La contraseña que tienes actualmente es: ".$artesano->getPassword()."<br>Atentamente,<br>Artesanías Manos de Oro";
    	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    	if(mail($destino, "Recuperación de la contraseña - Manos de Oro", $cadena,$cabeceras))
    	{
    		?>
		    	<meta http-equiv="REFRESH" content="0,url=../Interfaces/index.php"> 
		    	<script type="text/javascript">
		    		alert("Correo enviado");
		    	</script>
	    	<?php
    	}
    	else
    	{
    		?>
		    	<meta http-equiv="REFRESH" content="0,url=../Interfaces/recuperarContasena.php"> 
		    	<script type="text/javascript">
		    		alert("El correo no ha sido enviado");
		    	</script>
	    	<?php
    	}
    }
?>