<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	function mostrarMenu($permisos)
	{
		if($permisos<2)
		{
			return "<ul><li><a id=\"opc_admin\" href=\"admon.php\">Artesanos</a></li><li><a id=\"opc_admin\" href=\"admonNoticias.php\">Noticias</a></li><li><a id=\"opc_admin\" href=\"cambiarInstitucional.php\">Informacion Institucional</a></li><li><a id=\"opc_admin\" href=\"peticionesRegistro.php\">Peticiones de registro</a></li><li><a id=\"opc_admin\" href=\"verVentasAdmin.php\">Ver reporte total de ventas</a><br></li><li><a id=\"opc_admin\" href=\"confirmarStands.php\">Confirmar solicitudes de reserva de stands</a><br></li><li><a id=\"opc_admin\" href=\"agregarCurso.php\">Agregar un curso</a><br></li><li><a id=\"opc_admin\" href=\"cambiarComision.php\">Comision Tienda Virtual</a><br></li><li><a id=\"opc_admin\" href=\"cambiarContrasena.php\">Cambiar contraseña</a><br></li><li><a id=\"opc_admin\" href=\"creacionPerfil.php\">Crear nuevos Perfiles</a><br></li><li><a id=\"opc_admin\" href=\"creacionPersonas.php\">Administrar personas en el sistema</a><br></li></ul>";
		}
		else
		{
			$permisos=$permisos-2;
			$cadena="<ul><li><a id=\"opc_admin\" href=\"admon.php\">Artesanos</a></li>";
			if(($permisos& 1)!=0)
			{
				$cadena=$cadena."<li><a id=\"opc_admin\" href=\"agregarCurso.php\">Agregar un curso</a><br></li>";
			}
			if(($permisos&2)!=0)
			{
				$cadena=$cadena."<li><a id=\"opc_admin\" href=\"creacionPerfil.php\">Crear nuevos Perfiles</a><br></li>";
				$cadena=$cadena."<li><a id=\"opc_admin\" href=\"creacionPersonas.php\">Administrar personas en el sistema</a><br></li>";
			}
			if(($permisos&4)!=0)
			{
				$cadena=$cadena."<li><a id=\"opc_admin\" href=\"confirmarStands.php\">Confirmar solicitudes de reserva de stands</a><br></li>";
			}
			if(($permisos&8)!=0)
			{
				$cadena=$cadena."<li><a id=\"opc_admin\" href=\"verVentasAdmin.php\">Ver reporte total de ventas</a><br></li>";
			}
			if(($permisos&16)!=0)
			{
				$cadena=$cadena."<li><a id=\"opc_admin\" href=\"peticionesRegistro.php\">Peticiones de registro</a></li>";
			}	
			$cadena=$cadena."<li><a id=\"opc_admin\" href=\"cambiarContrasena.php\">Cambiar contraseña</a><br></li></ul>";
			return $cadena;
		}
	}
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]!="Administrador")
		{
			if($_SESSION["ROL"]=="Administrador de tienda")
			{
				?>
				<script>
					alert("No tienes permiso para ver esto. Ser\u00e1s redireccionado a tu p\u00e1gina de inicio");
				</script>
				<meta http-equiv="refresh" content="0,url=admonTienda.php">
				<?php
			}
			else
			{
				?>
					<script>
						alert("No tienes permiso para ver esto. Ser\u00e1s redireccionado a tu p\u00e1gina de inicio");
					</script>
					<meta http-equiv="refresh" content="0,url=principal.php">
				<?php	
			}
			
		}
		else
		{
			$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
			$adao=new AdministradorDao();
			$busqueda=new Administrador();
			$admin=new Administrador();
			$busqueda->setIdAdministrador($_SESSION["ID"]);
			$list=$adao->searchMatching($conn,$busqueda);
			$admin=$list[0];
			?>



<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]!="Administrador")
		{
			if($_SESSION["ROL"]=="Administrador de tienda")
			{
				?>
				<script>
					alert("No tienes permiso para ver esto. Ser\u00e1s redireccionado a tu p\u00e1gina de inicio");
				</script>
				<meta http-equiv="refresh" content="0,url=admonTienda.php">
				<?php
			}
			else
			{
				?>
					<script>
						alert("No tienes permiso para ver esto. Ser\u00e1s redireccionado a tu p\u00e1gina de inicio");
					</script>
					<meta http-equiv="refresh" content="0,url=principal.php">
				<?php	
			}
			
		}
		else
		{
			$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
			$adao=new AdministradorDao();
			$busqueda=new Administrador();
			$admin=new Administrador();
			$busqueda->setIdAdministrador($_SESSION["ID"]);
			$list=$adao->searchMatching($conn,$busqueda);
			$admin=$list[0];
			?>
<!DOCTYPE html>
<html>
	<head>
		<title>Manos de Oro - Admon Institucional</title>
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
				<div style="float: center; width: 33%;">
					<h1 id="titulos_noti">Panel de Adminsitración</h1>
				</div>
				<div id="desconectarse"style="float: right;">
					<center>
						<a id="titulos_desconectarse" href="../Logica/logout.php">Desconectarse</a>
					</center>
				</div>				
			</nav>
			<aside>
				<?php
					echo(mostrarMenu($admin->getTipo()));
				?>
			</aside>

			<section id="sec6">
				<center>

					<h1 id="strings_editar_rojo">A continuación, puede encontrar los campos para cambiar la información institucional, esto es, ¿quiénes somos?, misión y visión. Si no 
					desea editar un campo, déjelo vacío</h1><br>
					<form method="POST" action="../Logica/cambiarInstitucional.php">
						<table>
							<tr>
								<td>
									<h1 id="strings_editar_rojo">¿Quiénes somos?</h1>
								</td>
								<td>
									<textarea style='width: 400px; height: 100px; resize:none; margin-bottom: 1cm;' type='text' name='somos' maxlength='65536'></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h1 id="strings_editar_rojo">Misión</h1>
								</td>
								<td>
									<textarea style='width: 400px; height: 100px; resize:none; margin-bottom: 1cm;' type='text' name='mision' maxlength='65536'></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h1 id="strings_editar_rojo">Visión</h1>
								</td>
								<td>
									<textarea style='width: 400px; height: 100px; resize:none; margin-bottom: 1cm;' type='text' name='vision' maxlength='65536'></textarea>
								</td>
							</tr>
							<tr>
								<td colspan='2'>

								</td>
							</tr>
						</table>
<center>
									<input id="boton_iniciar" type="submit" value="Aceptar">
</center>
					</form>

				</center>
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
	}
	else
	{
		?>
				<script>
					alert("No est\u00e1s autenticado. Ser\u00e1s redireccionado a la p\u00e1gina de autenticaci\u00d3n");
				</script>
				<meta http-equiv="refresh" content="0,url=autenticacionadmin.php">
			<?php
	}

?>







			<?php
		}
	}
	else
	{
		?>
				<script>
					alert("No est\u00e1s autenticado. Ser\u00e1s redireccionado a la p\u00e1gina de autenticaci\u00d3n");
				</script>
				<meta http-equiv="refresh" content="0,url=autenticacionadmin.php">
			<?php
	}

?>