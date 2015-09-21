<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new ArtesanoDao();
	$id=$_POST["id"];
	$idproducto=$_POST["idproducto"];
	$artesano=new Artesano();
	$artesano=$adao->getObject($conn,$id);
	$dirrut=$_FILES["rut"]["tmp_name"];
	$formatorut=substr($_FILES["rut"]["name"], strrpos($_FILES["rut"]["name"], ".") );  //Obtener la última aparición del punto y por consiguiente, el formato
	$destinorut=$filelocation."/rut".$id.$formatorut;
	$dircamcom=$_FILES["camcom"]["tmp_name"];
	$formatocamcom=substr($_FILES["camcom"]["name"], strrpos($_FILES["camcom"]["name"], ".") );  //Obtener la última aparición del punto y por consiguiente, el formato
	$destinocamcom=$filelocation."/camcom".$id.$formatocamcom;
	$dirfoto=$_FILES["foto"]["tmp_name"];
	$formatofoto=substr($_FILES["foto"]["name"], strrpos($_FILES["foto"]["name"], ".") );  //Obtener la última aparición del punto y por consiguiente, el formato
	$destinofoto=$filelocation."/foto".$id.$formatofoto;
	/*$dirfotoproducto=$_FILES["fotoproducto"]["tmp_name"];
	$formatofotoproducto=substr($_FILES["fotoproducto"]["name"], strrpos($_FILES["fotoproducto"]["name"], ".") );  //Obtener la última aparición del punto y por consiguiente, el formato
	$destinofotoproducto=$filelocation."/fotoproducto".$idproducto.$formatofotoproducto;*/
	$correcto=true;
	if(!move_uploaded_file($dirrut, $destinorut))
	{
		$correcto=false;
	}
	if(!move_uploaded_file($dircamcom, $destinocamcom))
	{
		$correcto=false;
	}
	if(!move_uploaded_file($dirfoto, $destinofoto))
	{
		$correcto=false;
	}
	/*if(!move_uploaded_file($dirfotoproducto, $destinofotoproducto))
	{
		$correcto=false;
	}*/
	if(!$correcto)
	{
		?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/subirDocumentos.php">
			<script type="text/javascript">
				alert("Error subiendo los archivos");
			</script>
		<?php
	}
	else
	{
		$artesano->setEstado(2);
		if($formatofoto==".jpg")
		{
			$artesano->setFormatofoto(1);
		}
		else
		{
			$artesano->setFormatofoto(2);	
		}
		if($adao->save($conn,$artesano))
		{
			?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/principal.php">
			<script type="text/javascript">
				alert("Archivos subidos exitosamente");
			</script>
			<?php
		}
		else
		{
			?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/subirDocumentos.php">
			<script type="text/javascript">
				alert("Error alterando la B.D ");
			</script>
			<?php
		}
	}
?>