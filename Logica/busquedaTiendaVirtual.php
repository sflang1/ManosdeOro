<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Variables.php");	
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$pdao=new ProductoDao();
	if(isset($_GET["busqueda"]))
	{
		$busqueda=$_GET["busqueda"];
		$productos=$pdao->busquedaTiendaVirtual($conn,$busqueda);
		if(count($productos)==0)
		{
			$res = array('exito' => 1,'conteo'=> 0);
		}
		else
		{
			$primerarray=array('exito' => 1,'conteo'=> 1);
			$res3 = array();
			for($i=0;$i<count($productos);$i++)
			{
				$producto=$productos[$i];
				if($producto->getFormatofoto()==1)
				{
					$foto="../Archivos/fotoProducto".$producto->getIdproducto().".jpg";
				}
				else
				{
					$foto="../Archivos/fotoProducto".$producto->getIdproducto().".png";
				}
				$res1 = array('idProducto'=>$producto->getIdproducto(),'foto' => $foto, 'descripcion'=>$producto->getDescripcion());

				$res2=  array($res1);
				$res3= array_merge($res3,$res2);
			}
			$res=  array('productos' => $res3 );
			$res=array_merge($primerarray,$res);
		}
	}
	else
	{
		$res = array('exito' => 0 );
	}
	echo(json_encode($res));
?>