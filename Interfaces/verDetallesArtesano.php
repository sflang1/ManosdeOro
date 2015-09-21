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
					<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
					<title>Detalles del Artesano</title>
				</head>
				<body>
					Solicitaste detalles de un Artesano:
					<?php
						echo("<table>");
						if($artesano->getFormatofoto()==1)
						{
							echo("<tr><td>Foto:</td><td><img width='280' height='250' src='".$filelocation."/foto".$artesano->getIdartesano().".jpg'></tr>");
						}
						else
						{
							echo("<tr><td>Foto:</td><td><img src='".$filelocation."/foto".$artesano->getIdartesano().".png'></tr>");
						}
						echo("<tr><td>Nombre:</td><td>".utf8_encode($artesano->getNombre())."</td<</tr>");
						echo("<tr><td>Dirección:</td><td>".$artesano->getDireccion()."</td<</tr>");
						echo("<tr><td>Correo de contacto:</td><td>".$artesano->getEmail()."</td<</tr>");
						echo("</table>");
					?>
					<a href="confirmarStands.php">Volver a la página de solicitudes</a>
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