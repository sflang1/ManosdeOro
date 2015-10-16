<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/StandDao.php");
	include_once("../Librerias/Stand.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$sdao=new StandDao();
	$artesano=new Artesano();
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
			$lista=$sdao->loadAll($conn);
			$busqueda=new Stand();
			$busqueda->setIdartesano($_SESSION["ID"]);
			//Lógica de control de si ha reservado algún stand
			$stands=$sdao->searchMatching($conn,$busqueda);
			$mostrar1=true;
			$mostrar2=true;
			$mostrar3=true;
			if(count($stands)>0)
			{
				for($i=0;$i<count($stands);$i++)
				{
					if((0<$stands[$i]->getIdstand())&&($stands[$i]->getIdstand()<61))
					{
						$mostrar1=false;
						echo("Stand en el evento 1 reservado");
					}
					elseif ((60<$stands[$i]->getIdstand())&&($stands[$i]->getIdstand()<81)) 
					{
						$mostrar2=false;
						echo("Stand en el evento 2 reservado");
					}
					else
					{
						$mostrar3=false;
						echo("Stand en el evento 3 reservado");
					}
				}
			}
			?>


<!DOCTYPE html>
<html>
	<head>
		<title>Manos de Oro</title>
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
		<link rel="stylesheet" href="../css/css.css">
		<script type="text/javascript" src="../js/js.js"></script>
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

			<section id="sec4">
			<br>

						<br>
						<h1 id="titulos_detalles">Existen 3 eventos.</h1>
						<br>
						<h1 id="strings_editar">- El primero con 60 stands. Dispuesto en 2 patios</h1>
						<h1 id="strings_editar">- El segundo con 20. </h1>
						<h1 id="strings_editar">- El tercero con 20. </h1>
						<br>
						<h1 id="strings_editar_rojo">Selecciona un stand y resérvalo con el botón adyacente:<br></h1>
						<br>
						<table>
							<tr>
								<td>
									<h1 id="titulos_detalles">Manos de Oro (Abril)</h1>
								</td>
								<?php
									if($mostrar1)
									{
										?>
										<form method="POST" action="../Logica/reservarStand.php">
										<input type='hidden' name='id' value=<?php echo($artesano->getIdartesano());?>>
										<td>
											<input type="hidden" name="evento" value="1">
										</td>
										<td>
											<select name="nrostand" id="miSelect" onchange="dimePropiedades()" >
												<?php
													for($i=0;$i<60;$i++)
													{
														if($lista[$i]->getReservado()==0)
														{
															echo("<option value='".$lista[$i]->getIdstand()."'>".$lista[$i]->getIdstand()."</option>");
														}
													}
												?>
											</select>
										</td>
										<td>
											<input type='submit' value='Enviar'>
										</td>
										</form>	
										<?php
									}
									else
									{
										echo("<td colspan='3'>Ya reservaste un stand en este evento</td>");
									}
								?>
							</tr>
						</table>
						<br><br>
<br>
<h1 id="strings_editar_rojo">Claustro Santo Domingo - Patio 1 . Piso 1</h1>
<br>
<div>
<div class="container" >
			<div style="float:right; margin-top: 60px" style="width: auto;height: auto">
				<div class="borde" id="square10"><h1 id="strings_editar">10</h1></div>
				<div class="borde" id="square9"><h1 id="strings_editar">9</h1></div>
				<div class="borde" id="square8"><h1 id="strings_editar">8</h1></div>
				<div class="borde" id="square7"><h1 id="strings_editar">7</h1></div>
				<div class="borde" id="square6"><h1 id="strings_editar">6</h1></div>
				<div class="borde" id="square5"><h1 id="strings_editar">5</h1></div>
				<div class="borde" id="square4"><h1 id="strings_editar">4</h1></div>
				<div class="borde" id="square3"><h1 id="strings_editar">3</h1></div>
				<div class="borde" id="square2"><h1 id="strings_editar">2</h1></div>
				<div class="borde" id="square1"><h1 id="strings_editar">1</h1></div>
			</div>

			<div style="float:left;  margin-top: 130px" style=" width: auto; height: auto;">
				<div class="borde" id="square21"><h1 id="strings_editar">21</h1></div>
				<div class="borde" id="square22"><h1 id="strings_editar">22</h1></div>
				<div class="borde" id="square23"><h1 id="strings_editar">23</h1></div>
				<div class="borde" id="square24"><h1 id="strings_editar">24</h1></div>
				<div class="borde" id="square25"><h1 id="strings_editar">25</h1></div>
				<div class="borde" id="square26"><h1 id="strings_editar">26</h1></div>
				<div class="borde" id="square27"><h1 id="strings_editar">27</h1></div>
				<div class="borde" id="square28"><h1 id="strings_editar">28</h1></div>
				<div class="borde" id="square29"><h1 id="strings_editar">29</h1></div>
				<div class="borde" id="square30"><h1 id="strings_editar">30</h1></div>
			<center>
			<div id="horizontal2">
				<div class="borde" id="square40"><h1 id="strings_editar">40</h1></div>
				<div class="borde" id="square39"><h1 id="strings_editar">39</h1></div>
				<div class="borde" id="square38"><h1 id="strings_editar">38</h1></div>
				<div class="borde" id="square37"><h1 id="strings_editar">37</h1></div>
				<div class="borde" id="square36"><h1 id="strings_editar">36</h1></div>
				<div class="borde" id="square35"><h1 id="strings_editar">35</h1></div>
				<div class="borde" id="square34"><h1 id="strings_editar">34</h1></div>
				<div class="borde" id="square33"><h1 id="strings_editar">33</h1></div>
				<div class="borde" id="square32"><h1 id="strings_editar">32</h1></div>
				<div class="borde" id="square31"><h1 id="strings_editar">31</h1></div>
			</div>
			</center>

			<center>
			<div id="horizontal">
				<div class="borde" id="square11"><h1 id="strings_editar">11</h1></div>
				<div class="borde" id="square12"><h1 id="strings_editar">12</h1></div>
				<div class="borde" id="square13"><h1 id="strings_editar">13</h1></div>
				<div class="borde" id="square14"><h1 id="strings_editar">14</h1></div>
				<div class="borde" id="square15"><h1 id="strings_editar">15</h1></div>
				<div class="borde" id="square16"><h1 id="strings_editar">16</h1></div>
				<div class="borde" id="square17"><h1 id="strings_editar">17</h1></div>
				<div class="borde" id="square18"><h1 id="strings_editar">18</h1></div>
				<div class="borde" id="square19"><h1 id="strings_editar">19</h1></div>
				<div class="borde" id="square20"><h1 id="strings_editar">20</h1></div>
			</div>
			</div>
			</center>

</div>
<br>
<h1 id="strings_editar_rojo">Claustro Santo Domingo - Patio 2 - Piso 1</h1>
<br>
<div>
<div id="container2" >
			<div style="float:right; margin-top: 140px" style="width: auto;height: auto">
				<div class="borde" id="square45"><h1 id="strings_editar">45</h1></div>
				<div class="borde" id="square44"><h1 id="strings_editar">44</h1></div>
				<div class="borde" id="square43"><h1 id="strings_editar">43</h1></div>
				<div class="borde" id="square42"><h1 id="strings_editar">42</h1></div>
				<div class="borde" id="square41"><h1 id="strings_editar">41</h1></div>
			</div>

			<div style="float:left;  margin-top: 110px" style=" width: auto; height: auto;">
				<div class="borde" id="square51"><h1 id="strings_editar">51</h1></div>
				<div class="borde" id="square52"><h1 id="strings_editar">52</h1></div>
				<div class="borde" id="square53"><h1 id="strings_editar">53</h1></div>
				<div class="borde" id="square54"><h1 id="strings_editar">54</h1></div>
				<div class="borde" id="square55"><h1 id="strings_editar">55</h1></div>
			</div>
			<center>
			<div id="horizontal4">
				<div class="borde" id="square60"><h1 id="strings_editar">60</h1></div>
				<div class="borde" id="square59"><h1 id="strings_editar">59</h1></div>
				<div class="borde" id="square58"><h1 id="strings_editar">58</h1></div>
				<div class="borde" id="square57"><h1 id="strings_editar">57</h1></div>
				<div class="borde" id="square56"><h1 id="strings_editar">56</h1></div>
			</div>
			</center>

			<center>
			<div id="horizontal3">
				<div class="borde" id="square46"><h1 id="strings_editar">46</h1></div>
				<div class="borde" id="square47"><h1 id="strings_editar">47</h1></div>
				<div class="borde" id="square48"><h1 id="strings_editar">48</h1></div>
				<div class="borde" id="square49"><h1 id="strings_editar">49</h1></div>
				<div class="borde" id="square50"><h1 id="strings_editar">50</h1></div>
			</div>
			</center>
</div>
						<table>
							<tr>
								<td>
								<br>
									<h1 id="titulos_detalles">Muestra Artesanal (Agosto)</h1>
								<br>
								</td>
							</tr>
							<tr>
								<td>
									<br>
									<h1 id="strings_editar_rojo">Plazoleta San Francisco</h1>
									<br>
								</td>
								<?php
									if($mostrar2)
									{
										?>
										<form method="POST" action="../Logica/reservarStand.php">
										<input type='hidden' name='id' value=<?php echo($artesano->getIdartesano());?>>
										<td>
											<input type="hidden" name="evento" value="2">
										</td>
										<td>
											<select name="nrostand">
												<?php
													for($i=60;$i<80;$i++)
													{
														if($lista[$i]->getReservado()==0)
														{
															echo("<option value='".($lista[$i]->getIdstand()-60)."'>".($lista[$i]->getIdstand()-60)."</option>");
														}
													}
												?>
											</select>
										</td>
										<td>
											<input type='submit' value='Enviar'>
										</td>
										</form>	
										<?php
									}
									else
									{
										echo("<td colspan='3'>Ya reservaste un stand en este evento</td>");
									}
								?>
							</tr>
							</table>
							<br>
							<table>
								<tr>
									<td>
									<br>
										<h1 id="titulos_detalles">Muestra Gastronomica (Diciembre)</h1>
									<br>
									</td>
								</tr>
							<tr>
								<td>
									<br>
									<h1 id="strings_editar_rojo">Evento de Gastronomia</h1>
									<br>
								</td>
								<?php
									if($mostrar3)
									{
										?>
										<form method="POST" action="../Logica/reservarStand.php">
										<input type='hidden' name='id' value=<?php echo($artesano->getIdartesano());?>>
										<td>
											<input type="hidden" name="evento" value="3">
										</td>
										<td>
											<select name="nrostand">
												<?php
													for($i=80;$i<100;$i++)
													{
														if($lista[$i]->getReservado()==0)
														{
															echo("<option value='".($lista[$i]->getIdstand()-80)."'>".($lista[$i]->getIdstand()-80)."</option>");
														}
													}
												?>
											</select>
										</td>
										<td>
											<input type='submit' value='Enviar'>
										</td>
										</form>	
										<?php
									}
									else
									{
										echo("<td colspan='3'>Ya reservaste un stand en este evento</td>");
									}
								?>
							</tr>
						</table>
<br><br>

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
							<a onclick="ir_facebook()"><img src="../imgs/facebook.png" id="logo_redes2"></a>
							<h1 id="strings_footer">/ManosdeOro Popayan</h1>
						</div>
						<br>
						<div id="foot_twiter">
						<a onclick="ir_twiter()"><img src="../imgs/twiter.png" id="logo_redes2"></a>
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