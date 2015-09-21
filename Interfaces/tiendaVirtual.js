function buscarTiendaVirtual()
{
	var busqueda=document.getElementById("busquedaTiendaVirtual").value;
	$.getJSON("../Logica/busquedaTiendaVirtual.php?busqueda="+busqueda,
		function ( result)
		{
			if(result.exito==0)
			{
				alert("No se pudo realizar la búsqueda");
			}
			else
			{
				if(result.conteo==0)
				{	
					$("#articulosTiendaVirtual").html("No hay resultados con esta búsqueda");
				}
				else
				{
					var arrayproductos=result.productos;
					var cadena="<table>";
					for(var i=0;i<arrayproductos.length;i++)
					{
						cadena=cadena+"<tr><td><img src='"+arrayproductos[i].foto+"' width='180' height='150' onclick=\"window.location.href='verDetalles.php?id="+arrayproductos[i].idProducto+"'\"><br><a href='verDetalles.php?id="+arrayproductos[i].idProducto+"'>"+arrayproductos[i].descripcion+"</td></tr>";
					}
					cadena=cadena+"</table>";
					$("#articulosTiendaVirtual").html(cadena);
				}
			}
		});
}