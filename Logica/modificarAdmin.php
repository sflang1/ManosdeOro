<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/AdministradorDao.php");
	include_once("../Librerias/Administrador.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$adao=new AdministradorDao();
	$admin=new Administrador();
	$admin=$adao->getObject($conn,$_POST["idAdmin"]);
	$admin->setPrimerNom(utf8_decode($_POST["primerNom"]));
	$admin->setSegundoNom(utf8_decode($_POST["segundoNom"]));
	$admin->setPrimerApe(utf8_decode($_POST["primerApe"]));
	$admin->setSegundoApe(utf8_decode($_POST["segundoApe"]));
	$admin->setEmail($_POST["email"]);
	if($adao->save($conn,$admin))
	{
		?>
		<META HTTP-EQUIV="REFRESH" CONTENT="0,URL=../Interfaces/admon.php">
		<script type="text/javascript">
			alert("Administrador cambiado exitosamente");
		</script>
		<?php
	}
	else
	{
		echo("<META HTTP-EQUIV='REFRESH' CONTENT='0,URL=../Interfaces/modificarAdmin.php?idAdmin=".$_POST["idAdmin"]."'>");
		?>
		<script type="text/javascript">
			alert("Error alterando el registro");
		</script>
		<?php
	}
?>