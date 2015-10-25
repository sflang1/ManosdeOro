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
				<nav>
					<center>
						<ul>
							<li onclick="ir_inicio()"> <img id="logo_nav" src="../imgs/logo.png">Inicio</li>
					<li onclick="ir_cursos()"> <img id="logo_nav" src="../imgs/logo.png">Cursos</li>
					<li onclick="ir_eventos()"> <img id="logo_nav" src="../imgs/logo.png">Eventos</li>
					<li onclick="ir_acerca()"> <img id="logo_nav" src="../imgs/logo.png">Acerca de</li>
					<li onclick="ir_expositores()"> <img id="logo_nav" src="../imgs/logo.png">Expositores</li>
					<li onclick="ir_tienda()"> <img id="logo_nav" src="../imgs/logo.png">Tienda</li>
					<li onclick="ir_contacto()"> <img id="logo_nav" src="../imgs/logo.png">Contacto</li>
						</ul>
					</center>
				</nav>
			<section id="sec2">

		<div style="float: left; width: 31%; margin-top: 30px; margin-left: 30px; padding: 5px" id="cont_evento" onclick="ir_expositores()">
		<img id="img_evento" src="../imgs/Imagen1.png">
		<p>Muestra Artesanal realizada en la plazoleta de San Francisco en el mes de Agosto, evento organizado por el Centro de Desarrollo Artesanal Manos de Oro.</p>		
			
		</div>
						
		<div style="float: left; width: 31%; margin-top: 30px; padding: 5px" id="cont_evento" onclick="ir_expositores()">
		<img id="img_evento" src="../imgs/Imagen2.png">
		<p>Muestra Artesanal realizada en el claustro de Santo Domingo en el marco de la Semana Santa, evento organizado por el Centro de Desarrollo Artesanal Manos de Oro.</p>				
		</div>

		<div style="float: left; width: 31%; margin-top: 30px; padding: 5px" id="cont_evento" onclick="ir_expositores()">
		<img id="img_evento" src="../imgs/Imagen3.png">
		<p>Muestra Artesanal realizada en las instalaciones de la Junta Pro Semana Santa en el mes de Diciembre, evento organizado por el Centro de Desarrollo Artesanal Manos de Oro.</p>
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
						<h1 id="strings_footer">Popayán – Cauca</h1><br><br><br><img src="../imgs/unidos.png" id="logo_institu2">
						
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