<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	if(isset($_SESSION["USER"]))
	{
		if($_SESSION["ROL"]!="Administrador de tienda")
		{
			if($_SESSION["ROL"]=="Administrador")
			{
				?>
				<script>
					alert("No tienes permiso para ver esto. Ser\u00e1s redireccionado a tu p\u00e1gina de inicio");
				</script>
				<meta http-equiv="refresh" content="0,url=admon.php">
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
			$pdao=new ProductoDao();
			$admin=$adao->getObject($conn,$_SESSION["ID"]);
			$busqueda=new Producto();
			$busqueda->setAceptado(2);
			$productos=$pdao->searchMatching($conn,$busqueda);
			$altofoto=150;
			$anchofoto=180;
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
	</head>
	<body>
		<div id="contenedor2" style="margin-bottom: 40px;">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
			<section id="sec9">
<center>
<h1 id="titulos_noti">A continuación se listan todos los productos que terminaron su registro y están en el sistema.</h1> <br><br>
					<a id="boton_iniciar" href='admonTienda.php'>Volver al inicio</a><br><br><br>
					<table style="border: 2px solid black;border-collapse: collapse;">
						<tr style="border: 2px solid black;border-collapse: collapse;">
							<td style="border: 2px solid black;border-collapse: collapse;">
								Foto del producto
							</td>
							<td style="border: 2px solid black;border-collapse: collapse;">
								Descripción del producto
							</td>
							<td style="border: 2px solid black;border-collapse: collapse;">
								Stock actual
							</td>
							<td style="border: 2px solid black;border-collapse: collapse;">
								Número de ventas a registrar
							</td>
							<td style="border: 2px solid black;border-collapse: collapse;">
								Aceptar
							</td>
						</tr>
						<?php
						for ($i=0; $i < count($productos); $i++) 
						{
							echo("<tr>");
							echo("<form method='POST' action='../Logica/registrarVentas.php' onsubmit='return validacionForm(".$productos[$i]->getIdproducto().")'>");
							
							echo("<td>");
							echo("<input type='hidden' name='id' value='".$productos[$i]->getIdproducto()."'>");
							if($productos[$i]->getFormatofoto()==1)
							{
								echo("<img src='../Archivos/fotoProducto".($productos[$i]->getIdproducto()).".jpg' width='".$anchofoto."' height='".$altofoto."'>");	
							}
							else
							{
								echo("<img src='../Archivos/fotoProducto".($productos[$i]->getIdproducto()).".png' width='".$anchofoto."' height='".$altofoto."' >");	
							}
							echo("</td>");
							echo("<td>");
							echo($productos[$i]->getDescripcion());
							echo("</td>");
							echo("<td>");
							echo($productos[$i]->getStock());
							echo("</td>");
							echo("<td>");
							echo("<input id='numero".$productos[$i]->getIdproducto()."' type='number' min='1' max='".$productos[$i]->getStock()."' name='ventas'>");
							echo("</td>");
							echo("<td>");
							echo("<input type='submit' value='Registrar ventas'>");
							echo("</td>");
							echo("</form>");
							echo("</tr>");

						}
						?>
					</table>
					<script type="text/javascript" src="registrarVentas.js"></script>

</center>
			</section>
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