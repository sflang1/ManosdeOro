<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/PerfilDao.php");
	include_once("../Librerias/Perfil.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$pdao=new PerfilDao();
	$nomPerfil=$_POST["nomPerfil"];
	$agregarProducto=$_POST["agregarProducto"];
	$registroVentas=$_POST["registroVentas"];
	$reservasStand=$_POST["reservasStand"];
	$editarPerfil=$_POST["editarPerfil"];
	$admonCursos=$_POST["admonCursos"];
	$valorPerfil=$agregarProducto*16+$registroVentas*8+$reservasStand*4+$editarPerfil*2+$admonCursos*1;
	echo($valorPerfil);
	$valorPerfil=$valorPerfil+2;
	$perfil=new Perfil();
	$perfil->setValorperfil($valorPerfil);
	$busqueda=$pdao->searchMatching($conn,$perfil);
	if(count($busqueda))
	{
		$perfil=$busqueda[0];
		echo("<script type=\"text/javascript\">alert(\"Ya se ha creado un perfil con esos permisos, bajo el nombre: ".$perfil->getNomperfil()."\");</script>");
		?>
		<META HTTP-EQUIV="REFRESH" CONTENT="0,url=../Interfaces/creacionPerfil.php">
		<?php
	}
	else
	{
		$perfil->setNomperfil($nomPerfil);
		if($pdao->create($conn,$perfil))
		{
			echo("<script type=\"text/javascript\">alert(\"Perfil creado correctamente\");</script>)");
			?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0,url=../Interfaces/creacionPerfil.php">
			<?php
		}
		else
		{
			echo("<script type=\"text/javascript\">alert(\"Error creando perfil. Por favor, contacte al administrador del sistema.\");</script>)");
			?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0,url=../Interfaces/creacionPerfil.php">
			<?php
		}
	}
?>