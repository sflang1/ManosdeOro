<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/Variables.php");
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]=="Artesano")
		{
			?>
			<meta http-equiv="refresh" content="0,url=principal.php">
			<?php
		}
		if($_SESSION["ROL"]=="Administrador")
		{
			?>
			<meta http-equiv="refresh" content="0,url=admon.php">
			<?php
		}
	}
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ndao=new NoticiasDao();
	$noticias=$ndao->loadAll($conn);
	

?>


<?php
	@session_start();
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]=="Artesano")
		{
			?>
			<meta http-equiv="refresh" content="0,url=principal.php">
			<?php
		}
		if($_SESSION["ROL"]=="Administrador")
		{
			?>
			<meta http-equiv="refresh" content="0,url=admon.php">
			<?php
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Manos de Oro - Inicio</title>
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

			<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=863470693719288";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<div id="contenedor">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					
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
		
			<section>

				<div style="padding: 10px; float: left; width: 35%; height: 500px;text-align: justify; overflow: scroll;;">
					<center>
						<div class="fb-like" data-href="https://www.facebook.com/pages/ManosdeOro-Popayan/1424524214510376?fref=ts" data-width="200px" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
						<br>
						<br>
<hr>
<br>
						<h1 id="titulos_noti">Noticias</h1>
<br>
						<?php
			for($i=4;$i<count($noticias);$i++)
			{
				$j=count($noticias)+3-$i;
				echo("<h2 id='titulos_noticias'>".$noticias[$j]->getTitulo()."</h2>");
				echo("<h3 id='strings_editar' style='noticias'>".$noticias[$j]->getContenido()."</h3>");
				echo("<br>");
				echo("<hr>");
			}
		?>


					</center>
				</div>

				<div style="float: right; width: 60%;">
					<div id="slider">
						<div><img id="fondo" src="../imgs/img1.jpg"></div>
						<div><img id="fondo" src="../imgs/img2.jpg"></div>
						<div><img id="fondo" src="../imgs/img3.jpg"></div>
						<div><img id="fondo" src="../imgs/img4.jpg"></div>
						<div><img id="fondo" src="../imgs/img5.jpg"></div> 
					</div>
					
					<script type="text/javascript">
					$(function(){
						$('#slider div:gt(0)').hide();
							setInterval(function(){
								$('#slider div:first-child').fadeOut(1000)
									.next('div').fadeIn(1000)
									.end().appendTo('#slider');
							},4000);
					})
					</script>
				</div>
			</section>
			<center>
			<div id="redes">
				<a onclick="ir_facebook()"><div id="face">
					<img src="../imgs/facebook_logo.png" id="logo_redes_soc">
					<h1 id="vist">Visitanos en Facebook</h1>
				</div></a>

				<a onclick="ir_twiter()"><div id="twiter">
					<img src="../imgs/Twitter_logo.png" id="logo_redes_soc">
					<h1 id="vist">Visitanos en Twiter</h1>
				</div></a>
			</div>
			</center>

			<footer>
			<div>
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
				</div>
			</div>	
			</footer>
		</div>
	</body>	
</html>