<?php 
mysql_connect("localhost","root","") or 
die("No se puede conectar");
mysql_select_db("departamento") or
die ("No se ha podido seleccionar la Base de Datos");
$depto=htmlentities($_REQUEST['depto']);
$peartamento=$depto;
$query="select * from departamentos"; 
$res=mysql_query(utf8_decode($query));
?>

<?php 
mysql_connect("localhost","root","") or 
die("No se puede conectar");
mysql_select_db("municipio") or
die ("No se ha podido seleccionar la Base de Datos");
$muni=htmlentities($_REQUEST['muni']);
$query="SELECT * FROM municipios WHERE id_departamento = '$depto'";
$peartamento=$depto;
$res2=mysql_query($query);
?>

<!DOCTYPE html PUBLIC >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>seleccionables</title>
</head>

<body>

<form name="form1" >
Selecciona tu departamento:
<select name="depto" >
<option value="" selected>Elige</option>
<?php while($row=mysql_fetch_array($res))
{?>
<option value="<?php echo $row['id_departamento']?>"> <?php echo htmlentities($row['descripcion']);?></option>
<?php } ?>
</select>

<input type="submit" name="enviar" value="Enviar" /><br /><br />
</form>
<?php echo "Tu materia elegida fue: ". htmlentities($peartamento);?>

<form name="form2" >
Selecciona tu departamento:
<select name="muni" >
<option value="" selected>Elige</option>
<?php while($row=mysql_fetch_array($res2))
{?>
<option value="<?php echo $row['descripcion']?>"> <?php echo htmlentities($row['descripcion']);?></option>
<?php } ?>
</select>
<input type="submit" name="enviar" value="Enviar" /><br /><br />
</form>
<?php echo "Tu materia elegida fue: ". $peartamento?> <br>
<?php echo "Tu materia elegida fue: ". htmlentities($muni);?>
</body>
</html>