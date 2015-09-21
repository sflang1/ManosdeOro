function borrarNotificacion(id)
{
	
	$.getJSON("../Logica/quitarNotificacion.php?id="+id,
		function (result)
		{
			location.reload(true);
			var a=1;
		});
}