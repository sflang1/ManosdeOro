<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$pdao=new ProductoDao();
	$artesano=new Artesano();


	include_once("../Librerias/CursosDao.php");
	include_once("../Librerias/Cursos.php");
	$cdao=new CursosDao();
	$lista=$cdao->loadAll($conn);

	if(!isset($_SESSION["USER"]))
	{
		?>
			<script type="text/javascript">
				alert("No tienes permiso para ver este contenido");
			</script>
			<META http-equiv="Refresh" content="0,url=index.php">
		<?php
	}
	else
	{
		if($_SESSION["ROL"]=="Artesano")
		{
			$artesano->setIdArtesano($_SESSION["ID"]);
			$list=$adao->searchMatching($conn,$artesano);
			$artesano=$list[0];
			$artesano=$adao->encodificaraUTF($artesano);
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
		<div id="contenedor">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
			<nav id="nav_admon">
				<div style="float: left; width: 70%;">
					<h1 id="titulos_noti2">Bienvenido, <?php echo($artesano->getNombre());?></h1>
				</div>
				<div id="desconectarse"style="float: right;">
					<center>
						<a id="titulos_desconectarse" href="../Logica/logout.php">Desconectarse</a>
					</center>
				</div>				
			</nav>
			<aside>
				<ul>
					<li><a id="opc_admin" href="principal.php">Inicio</a></li>
					<li><a id="opc_admin" href="agregarProducto.php">Agregar un nuevo producto</a></li>
					<li><a id="opc_admin" href="verVentas.php">Ver el registro de ventas de tus productos</a></li>
					<li><a id="opc_admin" href="reservarStand.php">Reservar Stand</a></li>
					<li><a id="opc_admin" href='editarInfoArtesano.php'>Editar perfil</a></li>
					<li><a id="opc_admin" href="cursos_artesanos.php">Cursos ofertados</a></li>
					<li><a id="opc_admin" href='cambiarContrasenaArtesano.php'>Cambiar contraseña</a></li>
				</ul>
			</aside>

			<section id="sec6">
			<br>

					<h1 id="titulos_inicio_sesion">Cursos Ofrecidos en el C.D.A</h1>
<hr>
		<?php
			for($i=0;$i<count($lista);$i++)
			{
				echo("<table>");
				echo("<tr>");
				echo("<td>");
				echo("<h2 id='titulos_acerca'>".$lista[$i]->getDescripcion()."</h2>");
				$cadena="../Archivos/".$lista[$i]->getFoto();
				
				echo("<img  height='280' width='300' src='".$cadena."'><br>");
				echo("</td>");
				echo("<td>");
				echo("<h1 id='creatucuenta' >Fecha Límite Inscripción: </h1>".$lista[$i]->getFecha_lim()."<br>");
				echo("<h1 id='creatucuenta' >Horario:  </h1>".$lista[$i]->getHorario());
				$cadena="\"window.location.href='form_cursos_art.php?nomCurso=".$lista[$i]->getDescripcion()."&nombre=".$artesano->getNombre()."& celular=".$artesano->getCelular()."& cedula=".$artesano->getNroDoc()."& email=".$artesano->getEmail()."& direccion=".$artesano->getDireccion()."& ciudad=".$artesano->getCiudad()."& departamento=".$artesano->getDepartamento()."'\" id='boton_iniciar'><img id='logo_btn' src='../imgs/logo.png'>Registro</button>";
				$cadena=str_replace("#", "%23", $cadena);
				echo("<br><button onclick=".$cadena);

				echo("</td>");
				echo("</tr>");
				echo("</table>");
echo("<br><hr>");
			}
		?>
		<br>

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



			<?php
		}
		if($_SESSION["ROL"]=="Administrador")
		{
			?>
				<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=admon.php">
				<script type="text/javascript">
					alert("Eres un administrador. Serás redirigido a tu página principal");
				</script>
			<?php
		}
		
	}
?>