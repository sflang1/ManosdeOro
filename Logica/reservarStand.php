<?php
	include_once("../Librerias/Datasource.php");
	include_once("../Librerias/Solicitud.php");
	include_once("../Librerias/SolicitudDao.php");
	include_once("../Librerias/ArtesanoDao.php");
	include_once("../Librerias/Artesano.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);
	$sdao=new SolicitudDao();
	$adao=new ArtesanoDao();
	$evento=$_POST["evento"];
	$nrostand=$_POST["nrostand"];
	$id=$_POST["id"];
	switch ($evento) 
	{
		case 1:
			$aumento=0;
			break;
		case 2:
			$aumento=60;
			break;
		case 3:
			$aumento=80;
			break;
		default:
			$aumento=0;
			?>
				<meta http-equiv="REFRESH" content="0,url=../Interfaces/reservarStand.php">
				<script type="text/javascript">
					alert("Error en el formulario");
				</script>
			<?php
			break;
	}
	$idstand=$nrostand+$aumento;
	$solicitud=new Solicitud();
	$solicitud->setIdstand($idstand);
	$solicitud->setIdartesano($id);
	if($sdao->create($conn,$solicitud))
	{
		?>
				<meta http-equiv="REFRESH" content="0,url=../Interfaces/principal.php">
				<script type="text/javascript">
					alert("Solicitud de reservaci\u00F3n enviada");
				</script>
			<?php
	}
	else
	{
		?>
			<meta http-equiv="REFRESH" content="0,url=../Interfaces/reservarStand.php">
			<script type="text/javascript">
				alert("Error en el formulario");
			</script>
		<?php
	}
?>