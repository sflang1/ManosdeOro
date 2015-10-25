<?php
	@session_start();
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]=="Artesano")
		{
			?>
			<meta http-equiv="refresh" content="0,url=/principal.php">
			<?php
		}
		if($_SESSION["ROL"]=="Administrador")
		{
			?>
			<meta http-equiv="refresh" content="0,url=/admon.php">
			<?php
		}
	}
	include_once("../Librerias/Datasource.php");	
	include_once("../Librerias/DepartamentoDao.php");
	include_once("../Librerias/Departamento.php");
	include_once("../Librerias/Municipio.php");
	include_once("../Librerias/MunicipioDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ddao=new DepartamentoDao();
	$mdao=new MunicipioDao();
	$listaDeptos=$ddao->loadAll($conn);
	$busqueda=new Municipio();
	$busqueda->setId_departamento(1);
	$listaMpios=$mdao->searchMatching($conn,$busqueda);	
?>




<!DOCTYPE html>
<html>
	<head>
		<title>Manos de Oro - Contacto</title>
		<link rel="apple-touch-icon" sizes="57x57" href="../imgs/icono/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="../imgs/icono/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="../imgs/icono/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="../imgs/icono/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="../imgs/icono/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="../imgs/icono/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="../imgs/icono/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="../imgs/icono/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../imgs/icono/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="../imgs/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../imgs/icono/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../imgs/icono/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../imgs/icono/favicon-16x16.png">
		<meta name="msapplication-TileImage" content="../imgs/icono/ms-icon-144x144.png">
		<meta http-equiv="Content-Type" Content="text/html; charset=UTF-8"/>
				<link rel="stylesheet" href="../css/diseno.css">
		<script type="text/javascript" src="../js/re_dir.js"></script>
		
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script type="text/javascript"><!--
    function initialize() {
        var latlng = new google.maps.LatLng(2.4410316,-76.6047626);
        var settings = {
            zoom: 16,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
	var companyPos = new google.maps.LatLng(2.440802, -76.604739);
	var companyMarker = new google.maps.Marker({
      position: companyPos,
      map: map,
      title:"Manos de Oro"
  });
    }
</script>
	</head>
	<body  onload="initialize()">
		<div id="contenedor">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<div class="fb-like" data-href="https://www.facebook.com/pages/ManosdeOro-Popayan/1424524214510376?fref=ts" data-width="200px" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
				
			<section id="sec4">
				<h1 id="titulos_inicio_sesion">Creación de la cuenta de usuario</h1>
				<br>
				<hr>
		<h1 id="strings_editar_rojo">Descargue su Formulario en (PDF)</h1><a href="../formulario/formulario.pdf">Aqui</a>
		<br>
		<br>
		<Hr>
		<br>

		<h1 id="titulos_noti">Por favor, llene el siguiente formulario. Los campos con * son obligatorios</h1>
		<form method="POST" action="../Logica/registrarArtesano.php" onsubmit="return validacionForm()">
			<table>
				<input type="hidden" value="0" name="origen">
				<tr>
					<td colspan="2" id="strings_editar_rojo">
						Información básica sobre el Usuario:
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Primer nombre (*)
					</td>
					<td>
						<input type="text" id="primerNom" name="primerNom" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Segundo nombre
					</td>
					<td>
						<input type="text" name="segundoNom">
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Primer apellido (*)
					</td>
					<td>
						<input type="text" id="primerApe" name="primerApe" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Segundo apellido
					</td>
					<td>
						<input type="text" name="segundoApe">
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Documento de identidad (*)
					</td>
					<td>
						<select name="tipo" id="strings_editar2">
							<option value="0">Cédula de Ciudadanía</option>
							<option value="1">Cédula de Extranjería</option>
							<option value="2">Tarjeta de Identidad</option>
							<option value="3">Registro Civil</option>
							<option value="4">Número de pasaporte</option>
						</select>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						
					</td>
					<td colspan="2" id="strings_editar_rojo">
						<input type="text" id="docId" name="nroDoc" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Escoge tu departamento:
					</td>
					<td>
					<select name="depto" id="selectDepartamentos" onChange="getMunicipios()" >
					<option value=""  selected>Elige</option>
						<?php for($i=0;$i<count($listaDeptos);$i++)
						{?>
						<option value="<?php echo $listaDeptos[$i]->getId_departamento()?>"> <?php echo htmlentities($listaDeptos[$i]->getDescripcion());?></option>
						<?php } ?>
					</select>
					</td>
					</tr>
				<tr>
					<td id="strings_editar">
						Selecciona tu municipio: 
					</td>
					<td>
						<div id="selectMunicipios">
						<select name="city" id="strings_editar2">
						<option value="" selected>Elige</option>
						<?php for($i=0;$i<count($listaMpios);$i++)
						{?>
						<option value="<?php echo $listaMpios[$i]->getId_departamento()?>"> <?php echo htmlentities($listaMpios[$i]->getDescripcion());?></option>
						<?php } ?>
						</select>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" id="strings_editar_rojo">
						Recuerde que su nombre de usuario será su documento de identidad sin ningún guión ni elemento adicional.
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Contraseña (*)
					</td>
					<td>
						<input type="password" id="password" name="password" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Repita su Contraseña (*)
					</td>
					<td>
						<input type="password" id="passwordrep" name="passwordrep" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Dirección (*)
					</td>
					<td>
						<input type="text" id="direccion" name="direccion" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Teléfono Fijo
					</td>
					<td>
						<input type="text" name="telefono" id="telefono">
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Teléfono Fijo 2
					</td>
					<td>
						<input type="text" name="telefono2" id="telefono2">
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Celular (*)
					</td>
					<td>
						<input type="text" name="celular" id="celular" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Correo electrónico(*):
					</td>
					<td>
						<input type="email" name="email" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" id="strings_editar_rojo">
							Información adicional del Usuario:
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						¿Tiene certificación de su oficio por el Sena? (*)
					</td>
					<td>
						<input type="radio" name="certificacion" value="0" checked> No
						<input type="radio" name="certificacion" value="1">Sí
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Escoja su nivel de estudio. Debe haber terminado el nivel de estudio seleccionado: (*)
					</td>
					<td>
						<select name="estudios">
							<option value="0">Ninguno</option>
							<option value="1">Primaria</option>
							<option value="2">Bachillerato</option>
							<option value="3">Técnico</option>
							<option value="4">Tecnológico</option>
							<option value="5">Universitario</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" id="strings_editar_rojo">
							Información del Producto:
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						¿Deseas que tu producto se muestre en la tienda virtual? (*)
					</td>
					<td>
						<input type="radio" name="mostrar" value="0"> No
						<input type="radio" name="mostrar" value="1" checked>Sí
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Empresa por la que envía el producto (*)
					</td>
					<td>
						<input type="text" name="empresa" id="empresa" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Número de envío (*)
					</td>
					<td>
						<input type="text" name="nroenvio" id="nroenvio" required>
					</td>
				</tr>
								<tr>
					<td id="strings_editar">
						Nombre del producto (*)
					</td>
					<td>
						<input type="text" name="descripcion" id="descripcion" height="6em;" required>
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Link. Agrega un video que contenga más información:
					</td>
					<td>
						<input type="url" name="link" id="link">
					</td>
				</tr>
				<tr>
					<td colspan="2" id="strings_editar">
							La URL debe tener http o https. Sugerencia: Copia y pega el link del navegador
					</td>
				</tr>
				<tr>
					<td id="strings_editar">
						Descripcion del Producto(*)
					</td>
				</tr>
				<tr>
					<td>
						<textarea style="resize:none" rows="5" cols="65" type="text" name="nombproducto" id="nombproducto"  required></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input id="boton_iniciar" type="submit" value="Aceptar">
					</td>
				</tr>
			</table>
		</form>
		<div id="errores"></div>
<br>
<br>
<br>
<center>
		<a href="index.php" id="strings_editar">Regresar al menú principal</a>
</center>
		<script type="text/javascript" src="Creacioncuenta.js"></script>
			</section>
			<footer>		
				<div style="float: left; width: 33%;">
						<h1 id="titulos_footer">Informacion</h1>
						<h1 id="strings_footer">Junta Permanente Pro Semana Santa</h1>
						<h1 id="strings_footer">Cda Manos De Oro</h1>
						<h1 id="strings_footer">Calle 5 # 4 – 51 Centro</h1>
						<h1 id="strings_footer">Teléfonos: 8220040 – 3154648923</h1>
						<h1 id="strings_footer">Correo: cdamanosdeoro@gmail.com</h1>
						<h1 id="strings_footer">Popayán – Cauca</h1>
				</div>
				<div style="float: left; width: 23%;">
						<h1 id="titulos_footer">Redes Sociales</h1>
						<div id="foot_face">
							<a onclick="ir_facebook()"><img src="../imgs/facebook.png" id="logo_redes"></a>
							<h1 id="strings_footer">/ManosdeOro Popayan</h1>
						</div>
						<br>
						<div id="foot_twiter">
						<a onclick="ir_twiter()"><img src="../imgs/twiter.png" id="logo_redes"></a>
						<h1 id="strings_footer">/@ManosdeOroPop</h1>
						<!--<a onclick="ir_instagram()"><img src="imgs/instagram.png" id="logo_redes"></a>
						<a onclick="ir_youtube()"><img src="imgs/youtube.png" id="logo_redes"></a> -->
						</div>
				</div>
				<div style="float: right; width: 43%;">
						<h1 id="titulos_footer">Ubicacion</h1>
						 <div id="map_canvas" style="width:auto; height:300px; margin-right:10px"></div>
			</footer>
		</div>
	</body>	
</html>