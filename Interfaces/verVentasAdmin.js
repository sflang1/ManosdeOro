function buscarPorFecha()
{
	var selectMeses=document.getElementById("selectMeses");
	var selectAño=document.getElementById("selectAgno");
	var radioTiempo=document.getElementsByName("criterio");
	for(var i=0;length=radioTiempo.length;i++)
	{
		if(radioTiempo[i].checked)
		{
			var criterio=radioTiempo[i].value;		
			break;
		}
	}
	var mes=selectMeses.options[selectMeses.selectedIndex].value;
	var año=selectAño.options[selectAño.selectedIndex].value;
	$.getJSON("../Logica/obtenerVentasPorFecha.php?mes="+mes+"&ano="+año+"&criterio="+criterio+"&admin=1&idArtesano=0",
		function (result)
		{
			if(result.exito==1)
			{
				var valores=result.valores;
				var cadena="";
				if(valores.length>0)
				{
					var idActual=valores[0].idProducto;
					var gananciaTotal=0;
					var stock=0;
					var comisionTotal=0;
					var Valorcomision=0;
					var unidadesVendidas=0;
					var nomProducto="";
					var Fecha;
					var precio="";
					var cadena="<table>";
					cadena+="<th style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Nombre del producto</th><th style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Unidades Vendidas en Total</th><th style='border: 1px solid black; border-collapse: collapse;padding:5px;'>Precio por unidad</th><th style='border: 1px solid black; border-collapse: collapse;padding:5px;'>Ventas totales</th>";
					cadena+="<th style='border: 1px solid black; border-collapse: collapse; padding:5px;' >Comisión manos de oro</th><th style='border: 1px solid black; border-collapse: collapse; padding:5px;' >Comisión para esta venta (%)</th><th style='border: 1px solid black; border-collapse: collapse;padding:5px;'>Fecha (aaaa-mm-dd)</th>";
					for (var i = 0;i<valores.length;i++) 
					{
						cadena+="<tr>";
						cadena+="<td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nomProducto+"</td>";
						cadena+="<td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].unidadesVendidas;
						cadena+="</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>$ "+valores[i].precio;
						cadena+="</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>$ "+(valores[i].unidadesVendidas*valores[i].precio);
						cadena+="</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>$ "+(valores[i].unidadesVendidas*valores[i].precio*valores[i].comision/100);
						cadena+="</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>$ "+(valores[i].comision)+"%";
						cadena+="</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].fecha+"</td>";
						cadena+="</tr>";
					}
					cadena+="</table>";
				}
				else
				{
					cadena="No se han encontrado resultados";
				}
				$("#listaVentas").html(cadena);
			}
		});
}