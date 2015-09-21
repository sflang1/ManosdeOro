function aceptarProducto(valor)
{
	$.getJSON("../Logica/aceptarRegistro.php?id="+valor,
		function (result)
		{
			var cadena="";
			if(result.valor==1)
			{
				if(result.productos==0)
				{
					$("#tabla").html("No hay peticiones pendientes");
				}
				else
				{
					var text=result.productos;
					var a="<table><tr>";
					a=a+"<td ><h1 id='strings_editar_rojo2'>Nombre</h1></td><td><h1 id='strings_editar_rojo2'>Dirección</h1></td><td><h1 id='strings_editar_rojo2'>Teléfono</h1></td><td><h1 id='strings_editar_rojo2'>Descripción</h1></td><td ><h1 id='strings_editar_rojo2'>Link</h1></td><td></td>";
					for (var i=0;i<text.length;i++) 
					{
						a=a+"<tr>";
						a=a+"<td id='strings_editar'>"+text[i].nomArtesano+"</td>";
						a=a+"<td id='strings_editar'>"+text[i].direccion+"</td>";
						a=a+"<td id='strings_editar'>"+text[i].telefono+"</td>";
						a=a+"<td id='strings_editar'>"+text[i].descripcion+"</td>";
						a=a+"<td id='strings_editar'>"+text[i].enlace+"</td>";
						a=a+"<td id='strings_editar'><input type='button' value='Aceptar Producto' onclick='aceptarProducto("+text[i].idproducto+")'></td>";
						a=a+"<td><input type='button' value='Rechazar Producto' onclick='rechazarProducto("+text[i].idproducto+")'></td></tr>";
					}
					a=a+"</table>";
					cadena=a;
					$("#tabla").html(cadena);
				}
			}
			else
			{
				cadena="La consulta no fue realizada exitosamente";
				$("#prueba").html(cadena);
			}
				
		});
}
function rechazarProducto(valor)
{
	$.getJSON("../Logica/rechazarRegistro.php?id="+valor,
		function (result)
		{
			var cadena="";
			if(result.valor==1)
			{
				if(result.productos==0)
				{
					$("#tabla").html("No hay peticiones pendientes");
				}
				else
				{
					var text=result.productos;
					var a="<table><tr><td>Descripción</td><td>Link</td><td></td></tr>";
					for (var i=0;i<text.length;i++) 
					{
						a=a+"<tr><td>"+text[i].descripcion+"</td><td>"+text[i].enlace+"</td><td><input type='button' value='Aceptar Producto' onclick='aceptarProducto("+text[i].idproducto+")'></td><td><input type='button' value='Rechazar Producto' onclick='rechazarProducto("+text[i].idproducto+")'></td></tr>";
					}
					a=a+"</table>";
					cadena=a;
					$("#tabla").html(cadena);
				}
			}
			else
			{
				cadena="La consulta no fue realizada exitosamente";
				$("#prueba").html(cadena);
			}
		});
}