<?php
	@session_start();
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/ProductoDao.php");
	include_once("../Librerias/Producto.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$idartesano=$_POST["ID"];
	$descripcion=$_POST["descripcion"];
	$enlace=$_POST["enlace"];
	$nroenvio=$_POST["nroenvio"];
	$empresa=$_POST["empresa"];
	$nombproducto=$_POST["nombproducto"];
	$producto=new Producto();
	$pdao=new ProductoDao();
	$producto->setIdartesano($idartesano);
	$producto->setAceptado(0);
	$producto->setNotificado(0);
	$producto->setDescripcion($descripcion);
	$producto->setNombproducto($nombproducto);
	$producto->setLink($enlace);
	$producto->setEmpresa($empresa);
	$producto->setNroenvio($nroenvio);
	$producto->setStock(0);
	$producto->setVentas(0);
	$producto->setFormatofoto(0);
	$producto->setPrecio(0);
	$producto->setMostrar($_POST["mostrar"]);
	if($pdao->create($conn,$producto))
	{
		?>
			<meta http-equiv="REFRESH" CONTENT="0,url=../Interfaces/principal.php">
			<script type="text/javascript">
				alert("Producto registrado exitosamente");
			</script>
		<?php
	}
	else
	{
		?>
			<meta http-equiv="REFRESH" CONTENT="0,url=../Interfaces/agregarProducto.php">
			<script type="text/javascript">
				alert("Registro no exitoso.");
			</script>
		<?php
	}
?>