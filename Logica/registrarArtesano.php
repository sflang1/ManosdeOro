<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$artesanoDao=new ArtesanoDao();
	$pDao=new ProductoDao();
	$nroDoc=utf8_decode($_POST["nroDoc"]);
	$reemplazar = array("/","-","\\","_"," ",".",",","'");
    $username=str_replace($reemplazar, "", $nroDoc);
    $tipodoc=$_POST["tipo"];
    $busqueda=new Artesano();
    $busqueda->setUsername($username);
    $busqueda->setTipoDoc($tipodoc);
    $existentes=$artesanoDao->searchMatching($conn,$busqueda);
    if(count($existentes)>0)
    {
    	?>
    	<meta http-equiv="REFRESH" content="0,url=../Interfaces/Creacioncuenta.php">
    	<script type="text/javascript">
    		alert("Ya hay un usuario con el documento de identidad: "+<?php echo($nroDoc);?>);
    	</script>
    	<?php
    }
    else
    {
		$primernom=utf8_decode($_POST["primerNom"]);
		$segundonom=utf8_decode($_POST["segundoNom"]);
		$primerape=utf8_decode($_POST["primerApe"]);
		$segundoape=utf8_decode($_POST["segundoApe"]);
		$segundonom=str_replace("", "\b", $segundonom);
		$segundoape=str_replace("", "\b", $segundoape);
		$nombre=$primernom." ".$segundonom." ".$primerape." ".$segundoape;
		$password=utf8_decode($_POST["password"]);
		$direccion=utf8_decode($_POST["direccion"]);
		$telefono=utf8_decode($_POST["telefono"]);
		$telefono2=utf8_decode($_POST["telefono2"]);
		$email=utf8_decode($_POST["email"]);
		$celular=utf8_decode($_POST["celular"]);
		$certificacion=$_POST["certificacion"];
		$estudios=$_POST["estudios"];
		$artesano=new Artesano();
		$artesano->setNombre($nombre);
		$artesano->setTipoDoc($tipodoc);
		$artesano->setNroDoc($nroDoc);
		$artesano->setPassword($password);
		$artesano->setDireccion($direccion);
		$artesano->setTelefono($telefono);
		$artesano->setTelefono2($telefono2);
		$artesano->setUsername($username);
		$artesano->setCelular($celular);
		$artesano->setCertificacion($certificacion);
		$artesano->setEmail($email);
		$artesano->setNivelestudio($estudios);
		$artesano->setEstado(0);
		if($artesanoDao->create($conn,$artesano))
		{
			$list=($artesanoDao->searchMatching($conn,$artesano));
			$artesano=$list[0];
			$descripcion=$_POST["descripcion"];
			$link=$_POST["link"];
			$empresa=utf8_decode($_POST["empresa"]);
			$nroenvio=$_POST["nroenvio"];
			$producto=new Producto();
			$producto->setAll(1,$descripcion,$link,$artesano->getIdArtesano(),0,$empresa,$nroenvio,0,0,0,0,0,$_POST["mostrar"]);
			if($pDao->create($conn,$producto))
			{
				$asunto="Notificación artesano  registrado: ".$artesano->getNombre();
				$cadena="Estimad@ administrador<br>Te informamos que se ha registrado un nuevo artesano. Puedes proceder a aceptarlo o rechazarlo.<br>Atentamente,<br>Artesanías Manos de Oro";
				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				mail("fxcamargo@gmail.com", $asunto, $cadena,$cabeceras);
				if($_POST["origen"]==0)
				{
					$_SESSION["USER"]=$artesano;
					$_SESSION["ID"]=$artesano->getIdArtesano();
					$_SESSION["ROL"]="Artesano";
					?>
					<script type="text/javascript">
						alert("Usuario creado correctamente");
					</script>
					<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces/principal.php">
					<?php		
				}
				else
				{
					?>
					<script type="text/javascript">
						alert("Usuario creado correctamente");
					</script>
					<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces/creacionPersonas.php">
					<?php	
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("Error creando usuario");
				</script>
				<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces/Creacioncuenta.php">
				<?php		
			}
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Error creando usuario");
			</script>
			<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces/Creacioncuenta.php">
			<?php
		}
    }
	
?>