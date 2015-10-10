<?php 
	include_once("../Librerias/Datasource.php");	
	include_once("../Librerias/DepartamentoDao.php");
	include_once("../Librerias/Departamento.php");
	include_once("../Librerias/Municipio.php");
	include_once("../Librerias/MunicipioDao.php");
	include_once("../Librerias/Variables.php");
	$conn=new Datasource($dbhost,$dbName,$dbUser,$dbPassword);	
	$ddao=new DepartamentoDao();
	$mdao=new MunicipioDao();
	$listaDeptos=$ddao->loadAll($conn);
	$busqueda=new Municipio();
	$busqueda->setId_departamento(1);
	$listaMpios=$mdao->searchMatching($conn,$busqueda);	
?>


<!DOCTYPE html PUBLIC >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>seleccionables</title>
</head>

<body>

<form name="form1" >
Selecciona tu departamento:
<select name="depto" id="selectDepartamentos" onChange="getMunicipios()">
<option value=""  selected>Elige</option>
<?php for($i=0;$i<count($listaDeptos);$i++)
{?>
<option value="<?php echo $listaDeptos[$i]->getId_departamento()?>"> <?php echo htmlentities($listaDeptos[$i]->getDescripcion());?></option>
<?php } ?>
</select>
<br>
<div id="selectMunicipios">
Selecciona tu municipio: 
<select name="muni" >
<option value="" selected>Elige</option>
<?php for($i=0;$i<count($listaMpios);$i++)
{?>
<option value="<?php echo $listaMpios[$i]->getId_departamento()?>"> <?php echo htmlentities($listaMpios[$i]->getDescripcion());?></option>
<?php } ?>
</select>
</div>
</form>
<script type="text/javascript" src="../Librerias/jquery-1.3.1.js"></script>
<script type="text/javascript">
	function getMunicipios()
	{
		var depID=document.getElementById("selectDepartamentos").value;
		$.getJSON("../Logica/obtenerMunicipioPorDepto.php?id_depto="+depID,
			function (result)
			{
				cadena="Selecciona tu municipio: ";
				if(result.exito==1)
				{
					
					array=result.valores;
					cadena=cadena+"<select name='muni'>";
					for(i=0;i<array.length;i++)
					{
						cadena=cadena+"<option value='"+array[i].id_mpio+"'>"+array[i].descripcion+"</option>";
					}
					cadena=cadena+"</select>";
					$("#selectMunicipios").html(cadena);
				}
			});
	}
</script>
</body>
</html>