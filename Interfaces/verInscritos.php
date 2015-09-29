<?php	
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/Variables.php");
	function formatearNumero($valor)
	{
		$largo=strlen($valor);
		$reves=strrev($valor);
		if(($largo%3)==0)
		{
			$limciclo=$largo/3;
		}
		else
		{
			$limciclo=(($largo-($largo%3))/3)+1;
		}
		$cad="";
		$str1="";
		for($i=0;$i<$limciclo;$i++)
		{
			$j=3*$i;
			$str1=substr($reves,$j,3);
			if(($i%2)!=0)
			{
				$cad=$cad.".".$str1;
			}
			else
			{
				$cad=$cad."'".$str1;
			}
		}
		$valor=strrev($cad);
		$valor=substr($valor, 0,(strlen($valor)-1));
		return $valor;
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
			$pdao=new ProductoDao();
			$adao=new ArtesanoDao();
			$ndao=new NoticiasDao();
			$busqueda1=new Producto();
			$busqueda2=new Producto();
			$busqueda1->setAceptado(2);
			$busqueda2->setAceptado(3);
			$pconstock=$pdao->searchMatching($conn,$busqueda1);
			$psinstock=$pdao->searchMatching($conn,$busqueda2);
			$objcomision=$ndao->getObject($conn,-1);		
			$porccomision=$objcomision->getContenido();
			?>

			<!DOCTYPE HTML>
			<html>
				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
					
					<title>Inscritos a Cursos</title>
				</head>
				<body>
<div id="reporte">
					<center>
					<img src="../imgs/logo2.png" id="logo_cabecera2">

					</center>
<center>		
			<?php
				require_once '..\Logica\config.php';
				require_once '..\Logica\funciones_bd.php';
				$db = new funciones_bd();

				$result = mysql_query("SELECT * from inscritos");
			        $num_rows = mysql_num_rows($result); //numero de filas retornadas
	        		if ($num_rows > 0) {   
					$result = mysql_query("SELECT * FROM inscritos");
					$myarray = array();
			?>
            <table>
	            <tr>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Curso</td>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Nombre</td>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Cedula</td>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Email</td>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Celular</td>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Direccion</td>
		            <td style='border: 1px solid black; border-collapse: collapse; padding: 10px' >Ciudad</td>
	            </tr>
            <?php
            while($tabla = mysql_fetch_array($result)){
				echo("<tr>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['curso']."</td>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['nombre']."</td>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['cedula']."</td>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['email']."</td>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['celular']."</td>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['direccion']."</td>");
					echo ("<td style='border: 1px solid black; border-collapse: collapse; padding: 5px' ' >".$tabla['ciudad']."</td>");
				echo("</tr>");
			}
			?>
	     </table>
				<?php
            
        	}else{
            
        	}

	        ?>

</center>

</div>
<center>

					<a href="agregarCurso.php">Volver al inicio</a>
</center>
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
<footer>
					<a href="agregarCurso.php">Volver al inicio</a>
</footer>