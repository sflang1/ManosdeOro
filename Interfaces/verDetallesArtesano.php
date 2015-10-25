<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
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
			$admdao=new AdministradorDao();
			$busqueda=new Administrador();
			$adao=new ArtesanoDao();
			$admin=new Administrador();
			$busqueda->setIdAdministrador($_SESSION["ID"]);
			$list=$admdao->searchMatching($conn,$busqueda);
			$admin=$list[0];
			$idartesano=$_GET["id"];
			$artesano=$adao->getObject($conn,$idartesano);
			?>
			<!DOCTYPE HTML>
			<html>
				<head>
					<link rel="stylesheet" href="../css/diseno.css">
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
					<title>Detalles del Artesano</title>
				</head>
				<body>
					<div id="reporte">
					<center>
					<img src="../imgs/logo2.png" id="logo_cabecera2">
					<h1 id="opc_admin">Detalles del Artesano:</h1>
					<br><br>
					
					<?php
						echo("<table>");
						if($artesano->getFormatofoto()==1)
						{
							echo("<tr><td><h1 id='strings_editar_rojo'>Foto Artesano:</h1></td><td><img style='heigth: 250px; width:280px;' src='".$filelocation."/foto_".$artesano->getNroDoc().".jpg'></tr>");
						}
						else
						{
							echo("<tr><td>Foto Artesano:</td><td><img style='heigth: 150px; width:180px;' src='".$filelocation."/foto".$artesano->getIdartesano().".png'></tr>");
						}
						echo("<tr><td style='padding: 5px'><h1 id='strings_editar_rojo'>Nombre:</h1></td><td>".utf8_encode($artesano->getNombre())."</td<</tr>");
						echo("<tr><td style='padding: 5px'><h1 id='strings_editar_rojo'>Direccion:</h1></td><td>".$artesano->getDireccion()."</td<</tr>");
						echo("<tr><td style='padding: 5px'><h1 id='strings_editar_rojo'>Correo de contacto:</h1></td><td>".$artesano->getEmail()."</td<</tr>");
						echo("</table>");
					?>
					</center>
					<br>
					<center>
					<a href="confirmarStands.php">Volver a la pagina de solicitudes</a>
					</center>
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