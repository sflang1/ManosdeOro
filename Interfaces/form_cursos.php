<?php
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
		<link rel="actionpple-touch-icon" sizes="152x152" href="../imgs/icono/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../imgs/icono/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="../imgs/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../imgs/icono/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../imgs/icono/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../imgs/icono/favicon-16x16.png">
		<meta name="msapplication-TileImage" content="../imgs/icono/ms-icon-144x144.png">
		<meta http-equiv="Content-Type" Content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="../css/diseno.css">
		<script type="text/javascript" src="../js/re_dir.js"></script>
		<script type="text/javascript" src="form_cursos.js"></script>

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
	<body onload="initialize()">
		<div id="contenedor" style="margin-bottom: 40px;">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
			<section id="sec3">
			<div style="padding: 10px; float: left; width: 35%; text-align: justify;">
					<center>
						<img id="logo2" src="../imgs/logo2.png">
					</center>
				</div>
			<form method="POST" action="../Logica/agregarInscrito.php">
				<div style="float: right; width: 60%;">
			<h1 id="titulos_contacto">Regristro Cursos C.D.A</h1>
			<h1 id="titulos_noti">Registro al curso: </h1>
			<tr><td> <input value="<?php echo($_GET["nomCurso"]);?>" id="input_txt" name='curso' readonly ></td></tr>
			<h1 id="strings_contacto">Una vez definido los asistentes de Nuestro Curso, Nos contactaremos con Usted</h1>
		
			<center>
			<table>
			<tr><td> <input placeholder="Nombre Completo" id="input_txt" type='text' name='nombre' required></td></tr>
			<tr><td> <input placeholder="Cedula" id="input_txt" type='tel' name='cedula' required></td></tr>
			<tr><td> <input placeholder="email" id="input_txt" type='email' name='email' required></td></tr>
			<tr><td> <input placeholder="Celular" id="input_txt" type='tel' name='celular' required></input></td></tr>
			<tr><td> <input placeholder="Direccion" id="input_txt" type='text' name='direccion' required></input></td></tr>
			
				<tr>
					<td id="strings_editar">
						Escoge tu departamento:
					</td>
					<td>
					<select name="depto" id="selectDepartamentos" onChange="getMunicipios()" >
					<option value="" selected>Elige</option>
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

			<tr><td colspan='2'></td></tr>
			</table>
			<input type='submit' id="boton_enviar" value='Enviar Registro'>
			<br>
			<br>
			<a href='ofertaCursos.php'>Volver a Oferta Cursos</a><br>
			<a href='index.php'>Volver al inicio</a>
			<br>
			<br>
			<br>
			<br>
			</center>
		</form>
				</div>
			
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