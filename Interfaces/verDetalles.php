<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$pdao=new ProductoDao();
	$adao=new ArtesanoDao();
	$idproducto=$_GET["id"];
	$producto=$pdao->getObject($conn,$idproducto);
	$artesano=$adao->getObject($conn,($producto->getIdartesano()));
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
		<div id="contenedor">
			<header>
				<div id="img_fon">
					<div id="img_fondo"></div>
					<img src="../imgs/logo1.png" id="logo_cabecera">
				</div>
			</header>
			<section id="sec5">


			<div style="padding: 10px; float: left; width: 35%; text-align: justify;">
					<center>
										
<?php 
			if($producto->getFormatofoto()==1)
			{
				echo("<img src='../Archivos/fotoProducto".($producto->getIdproducto()).".jpg' width='".$anchofoto."' height='".$altofoto."'>");	
			}
			else
			{
				echo("<img src='../Archivos/fotoProducto".($producto->getIdproducto()).".png' width='".$anchofoto."' height='".$altofoto."'");	
			}
		?>
		<br><h1 id="titulos_noticias">Precio del Producto</h1> $ <?php echo($producto->getPrecio());?>
		<h1 id="titulos_noticias">Nombre del Producto</h1> <?php echo($producto->getDescripcion());?><br>
		<h1 id="titulos_noticias">Detalles del Producto</h1> <?php echo(utf8_encode("<textarea readonly style='enabled:false; width:250px; height:80px; resize:none; border:transparent;'>".$producto->getNombproducto()."</textarea>"));?><br>
		<?php
			
			if(strlen($producto->getLink())!=0)
			{
				
				echo("Link con información adicional: <a href='".$producto->getLink()."'>aquí</a>");
			}
		?>
					</center>
				</div>

				<div style="float: right; width: 60%;">
						<h1 id="titulos_acerca">Detalles del artesano:</h1><br>
		<H1 ID="titulos_detalle">Nombre:</H1> <?php echo(utf8_encode($artesano->getNombre()));?><br>
		<H1 ID="titulos_detalle">Dirección:</H1> <?php echo($artesano->getDireccion());?><br>
		<H1 ID="titulos_detalle">Email:</H1> <?php echo($artesano->getEmail());?><br>
		<H1 ID="titulos_detalle">Teléfono:</H1> <?php echo($artesano->getTelefono());?><br>
		<H1 ID="titulos_detalle">Teléfono2:</H1> <?php echo($artesano->getTelefono2());?><br>
		<H1 ID="titulos_detalle">Celular:</H1> <?php echo($artesano->getcelular());?><br><br>
		<a href='tiendaVirtual.php'>Volver a la tienda</a><br>
		<a href='index.php'>Volver al inicio</a>
				</div>

			</section>
		</div>
	</body>	
</html>