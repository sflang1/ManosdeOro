<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$pdao=new ProductoDao();
	$id=$_POST["id"];
	$stock=$_POST["stock"];
	$precio=$_POST["precio"];
	$producto=new Producto();
	$producto=$pdao->getObject($conn,$id);
	if($producto->getFormatofoto()==0)
	{
		$dirfoto=$_FILES["foto"]["tmp_name"];
		$formatofoto=substr($_FILES["foto"]["name"], strrpos($_FILES["foto"]["name"], ".") );  //Obtener la última aparición del punto y por consiguiente, el formato
		$destinofoto=$filelocation."/fotoProducto".$id.$formatofoto;
		$correcto=true;
		if(!move_uploaded_file($dirfoto, $destinofoto))
		{	
			?>
				<meta http-equiv="REFRESH" content="0,url=../Interfaces/ingresarStock.php">
				<script type="text/javascript">
					alert("Error subiendo los archivos");
				</script>
			<?php
		}
		else
		{	
			if($formatofoto==".jpg")
			{
				$producto->setFormatofoto(1);
			}
			else
			{
				$producto->setFormatofoto(2);	
			}
		}
	}
	$producto->setStock($stock);
	$producto->setAceptado(2);
	$producto->setNotificado(0);
	$producto->setPrecio($precio);
	if($pdao->save($conn,$producto))
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/principal.php">
		<script type="text/javascript">
			alert("Stock registrado exitosamente");
		</script>
		<?php
	}
	else
	{
		?>
		<meta http-equiv="REFRESH" content="0,url=../Interfaces/ingresarStock.php">
		<script type="text/javascript">
			alert("Error alterando la B.D ");
		</script>
		<?php
	}
	
?>