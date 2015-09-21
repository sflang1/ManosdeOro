function confirmarStand(id)
{
	$.getJSON("../Logica/confirmarStand.php?id="+id,
		function ( result)
		{
			var a=1;
			if(result.exito==0)
			{
				alert(result.causa)
			}
			else
			{
				location.reload(true);
			}
		});
}