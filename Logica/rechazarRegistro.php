<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		$productoDao=new ProductoDao();
		$producto=new Producto();
		$producto=$productoDao->getObject($conn,$id);
		$producto->setAceptado(-1);
		$producto->setNotificado(0);
		$producto->setFormatofoto(0);
		$producto->setStock(0);
		$producto->setVentas(0);
		if($productoDao->save($conn,$producto))
		{
			$artesano=new Artesano();
			$adao=new ArtesanoDao();
			$artesano->setIdartesano($producto->getIdartesano());
			$artesano=$adao->getObject($conn,$producto->getIdartesano());		
			$asunto="Notificación estado del producto: ".$producto->getDescripcion();
			$cadena="Estimad@ ".$artesano->getNombre()."<br>El producto propuesto: ".$producto->getDescripcion()." no cumple con las expectativas esperadas por el CDA Manos de Oro, por tanto, fue rechazado.<br>Atentamente,<br>Artesanías Manos de Oro";
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			mail($artesano->getEmail(), $asunto, $cadena,$cabeceras);
			if($artesano->getEstado()==0)
			{
				$artesano->setEstado(-1);
			}
			if($adao->save($conn,$artesano))
			{
				$primerarray = array('valor' => 1 );
				$busqueda=new Producto();
				$busqueda->setAceptado(0);
				$lista=$productoDao->searchMatching($conn,$busqueda);
				if(count($lista)==0)
				{
					$res=array('valor'=>1,'productos'=>0);
				}
				else
				{
					$array3=array();
					for($i=0;$i<count($lista);$i++)
					{
						$prod=$lista[$i];
						$descripcion=$prod->getDescripcion();
						$enlace=$prod->getLink();
						$idProducto=$prod->getIdproducto();
						$art=$adao->getObject($conn,$prod->getIdartesano());
						$array1 = array('descripcion' => utf8_encode($descripcion),'enlace'=>$enlace,'idproducto'=>$idProducto,'nomArtesano'=>$art->getNombre(),'direccion'=>$art->getDireccion(),'telefono'=>$art->getTelefono());
						$array2 = array($array1);
						$array3=array_merge($array3,$array2);
						
					}
					$res = array('productos' => $array3 );
					$res=array_merge($primerarray,$res);
				}
			}
			else
			{
				$res = array('valor' => "0" );
			}
		}
		else
		{
			$res = array('valor' => "0" );
		}	
	}
	else
	{
		$res = array('valor' => "-1" );
	}
	echo (json_encode($res));
?>