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
					var cadena="<table id='tabla_tineda'><tr>";
					for(var i=0;i<arrayproductos.length;i++)
					{
						cadena=cadena+"<td style='padding-top:3px'><img style='cursor:pointer' src='"+arrayproductos[i].foto+"' width='180' height='150' onclick=\"window.location.href='verDetalles.php?id="+arrayproductos[i].idProducto+"'\"><br><a style='text-decoration:none; color: #000;' href='verDetalles.php?id="+arrayproductos[i].idProducto+"'>"+arrayproductos[i].descripcion+"</td>";
						if(i%4==0&&i!=0)
						{
							cadena+="</tr><tr>";
						}
					}
					cadena=cadena+"</tr></table>";
					$("#articulosTiendaVirtual").html(cadena);
				}
			}
		});
}