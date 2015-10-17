	<?php	
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/NoticiasDao.php");
	include_once("../Librerias/Noticias.php");
	include_once("../Librerias/Venta.php");
	include_once("../Librerias/VentaDao.php");
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
			$vdao=new VentaDao();
			$totalVentas=$vdao->loadAll($conn);
			$menor=9999;
			for($i=0;$i<count($totalVentas);$i++)
			{
				$año=substr($totalVentas[$i]->getFecha(), 0,4);
				if($año<$menor)
				{
					$menor=$año;
				}
			}
			$añoActual=date("Y");
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
					
					<title>Reporte de Ventas</title>
				</head>
				<body>
<div id="reporte">
					<center>
					<img src="../imgs/logo2.png" id="logo_cabecera2">
					</center>
<center>		
					<table style="border: 1px solid black; border-collapse: collapse;">
						<tr style="border: 1px solid black; border-collapse: collapse;">
							<th style="border: 1px solid black; border-collapse: collapse;">Descripción del producto</th>
							<th style="border: 1px solid black; border-collapse: collapse;">Artesano</th>
							<th style="border: 1px solid black; border-collapse: collapse;">Stock actual</th>
							<th style="border: 1px solid black; border-collapse: collapse;">Ventas totales</th>
							<th style="border: 1px solid black; border-collapse: collapse;">Precio del producto</th>
							<th style="border: 1px solid black; border-collapse: collapse;">Ventas totales</th>
							<th style="border: 1px solid black; border-collapse: collapse;">Comisión Manos de Oro</th>
						</tr>
					<?php
					$total=0;
					$totalganancia=0;
					$parcial=0;
					$parcialganancia=0;
					for($i=0;$i<count($pconstock);$i++)
					{

						$artesano=new Artesano();
						$artesano=$adao->getObject($conn,$pconstock[$i]->getIdartesano());
						echo("<tr >");
						echo("<td style='border: 1px solid black; border-collapse: collapse;'>".$pconstock[$i]->getDescripcion()."</td>");
						echo("<td style='border: 1px solid black; border-collapse: collapse;'>".utf8_encode($artesano->getNombre())."</td>");
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>".formatearNumero($pconstock[$i]->getStock())."</td>");
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>".formatearNumero($pconstock[$i]->getVentas())."</td>");
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>$ ".formatearNumero($pconstock[$i]->getPrecio())."</td>");
						$parcial=$pconstock[$i]->getVentas()*$pconstock[$i]->getPrecio();
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>$ ".formatearNumero($parcial)."</td>");
						//Obtención ganancia Manos de oro por el producto
						for($j=0;$j<count($totalVentas);$j++)
						{
							if($totalVentas[$j]->getIdProducto()==$pconstock[$i]->getIdProducto())
							{
								$parcialganancia=$parcialganancia+($totalVentas[$j]->getComision()*$pconstock[$i]->getPrecio()*$totalVentas[$j]->getNroProductosVendidos()/100);
							}
						}
						
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>$ ".formatearNumero($parcialganancia)."</td>");
						echo("</tr>");
						$total=$total+$parcial;
						$totalganancia=$totalganancia+$parcialganancia;
						$parcial=0;
						$parcialganancia=0;
					}
					for($i=0;$i<count($psinstock);$i++)
					{
						$artesano=new Artesano();
						$artesano=$adao->getObject($conn,$psinstock[$i]->getIdartesano());
						echo("<tr style='border: 1px solid black; border-collapse: collapse;'>");
						echo("<td style='border: 1px solid black; border-collapse: collapse;'>".$psinstock[$i]->getDescripcion()."</td>");
						echo("<td style='border: 1px solid black; border-collapse: collapse;'>".utf8_encode($artesano->getNombre())."</td>");
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>".formatearNumero($psinstock[$i]->getStock())."</td>");
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'>".formatearNumero($psinstock[$i]->getVentas())."</td>");
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'> $ ".formatearNumero($psinstock[$i]->getPrecio())."</td>");
						$parcial=$psinstock[$i]->getVentas()*$psinstock[$i]->getPrecio();
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'> $ ".formatearNumero($parcial)."</td>");
						//Obtención ganancia Manos de oro por el producto
						for($j=0;$j<count($totalVentas);$j++)
						{
							if($totalVentas[$j]->getIdProducto()==$psinstock[$i]->getIdProducto())
							{
								$parcialganancia=$parcialganancia+($totalVentas[$j]->getComision()*$psinstock[$i]->getPrecio()*$totalVentas[$j]->getNroProductosVendidos()/100);
							}
						}
						echo("<td style='text-align:right; border: 1px solid black; border-collapse: collapse;'> $ ".formatearNumero($parcialganancia)."</td>");
						echo("</tr>");
						$total=$total+$parcial;
						$totalganancia=$totalganancia+$parcialganancia;
						$parcial=0;
						$parcialganancia=0;
					}
					echo("<tr style='border: 1px solid black; border-collapse: collapse;' >");
					echo("<td style='border: 1px solid black; border-collapse: collapse;' >Total Ventas:</td>");
					echo("<td  style='text-align:center; border: 1px solid black; border-collapse: collapse;' colspan='6'>$".formatearNumero($total)."</td>");
					echo("</tr>");
					echo("<tr style='border: 1px solid black; border-collapse: collapse;' >");
					echo("<td style='border: 1px solid black; border-collapse: collapse;' >Total Ganancia Manos de Oro:</td>");
					echo("<td  style='text-align:center; border: 1px solid black; border-collapse: collapse;' colspan='6'>$".formatearNumero($totalganancia)."</td>");
					echo("</tr>");
					?>
					</table>
					<br><br>
					<div id='reporteMensual'>
						<h4>Búsqueda por meses</h4>
						<input type="radio" name="criterio" value="1">Antes de
						<input type="radio" name="criterio" value="2">Durante
						<input type="radio" name="criterio" value="3">Desde
						<select>
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
						<select>
						<?php
							for($i=$menor;$i<=$añoActual;$i++)
							{
								echo("<option value='".$i."'>".$i."</option>");
							}
						?>
						</select>
						<input type="button" value="Buscar" onClick="">
					</div>
					<br>
					<div id="listaVentas"></div>
					<br>
					<a href="admon.php">Volver al inicio</a>
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