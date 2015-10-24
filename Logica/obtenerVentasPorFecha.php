<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Venta.php");
	include_once("../Librerias/VentaDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$vdao=new VentaDao();
	$pdao=new ProductoDao();
	if($_GET["mes"]<10)
	{
		$_GET["mes"]="0".$_GET["mes"];
	}
	if($_GET["admin"]==1)
	{
		$lista=$vdao->buscarPorFecha($conn,$_GET["criterio"],$_GET["admin"],0,$_GET["mes"],$_GET["ano"]);	

	}
	else
	{
		$busqueda=new Producto();
		$busqueda->setIdArtesano($_GET["idArtesano"]);
		$listaProductos=$pdao->searchMatching($conn,$busqueda);
		$lista = array();
		for($i=0;$i<count($listaProductos);$i++)
		{
			$listaAux=$vdao->buscarPorFecha($conn,$_GET["criterio"],$_GET["admin"],$listaProductos[$i]->getIdProducto(),$_GET["mes"],$_GET["ano"]);
			$lista=array_merge($lista,$listaAux);
		}
	}
	$array1=array();
	for($i=0;$i<count($lista);$i++)
	{
		$prod=$pdao->getObject($conn,$lista[$i]->getIdProducto());
		$venta=$lista[$i];
		$array2 = array('idProducto'=>$prod->getIdProducto(),'nomProducto'=>$prod->getDescripcion(),'stock'=>$prod->getStock(),'precio'=>$prod->getPrecio(),'unidadesVendidas' => $venta->getNroProductosVendidos(),'comision'=>$venta->getComision(),'fecha'=>$venta->getFecha());
		$array1[]=$array2;
	}		
	$array3["exito"]=1;
	$array3["valores"]=$array1;
	echo json_encode($array3);
?>