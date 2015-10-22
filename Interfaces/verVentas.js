function buscarPorFecha()
{
	var selectMeses=document.getElementById("selectMeses");
	var selectAño=document.getElementById("selectAgno");
	var idArtesano=document.getElementById("idArtesano").value;
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
	$.getJSON("../Logica/obtenerVentasPorFecha.php?mes="+mes+"&ano="+año+"&criterio="+criterio+"&admin=0&idArtesano="+idArtesano,
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
					var comisionImpuesta=0;
					var unidadesVendidas=0;
					var nomProducto="";
					var precio="";
					var cadena="<table>";
					cadena+="<th style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>Nombre del producto</th><th style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>Unidades Vendidas en Total</th><th style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>Precio por unidad</th><th style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>Ventas totales</th>";
					cadena+="<th style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>Comisión manos de oro</th><th style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>Comisión Impuesta</th>";
					for (var i = valores.length - 1; i >= 0; i--) 
					{
						if(idActual==valores[i].idProducto)
						{
							//Calcular ganancia total y comisión ganada
							nomProducto=valores[i].nomProducto;
							unidadesVendidas=unidadesVendidas+parseFloat(valores[i].unidadesVendidas);
							gananciaTotal=gananciaTotal+(valores[i].unidadesVendidas*valores[i].precio);
							comisionImpuesta=valores[i].comision;
							comisionTotal=comisionTotal+(valores[i].unidadesVendidas*valores[i].precio*valores[i].comision/100);
							precio=valores[i].precio;
							stock=valores[i].stock;
						}
						else
						{
							alert("Se cambia el ID");
							cadena+="<tr>";
							cadena+="<td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+nomProducto+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+unidadesVendidas+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+precio+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+gananciaTotal+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+comisionTotal+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+comisionImpuesta+"</td>";
							cadena+="</tr>";
							idActual=valores[i].idProducto;
							gananciaTotal=(valores[i].unidadesVendidas*valores[i].precio);
							comisionImpuesta=valores[i].comision;
							comisionTotal=(valores[i].unidadesVendidas*valores[i].precio*valores[i].comision/100);
							unidadesVendidas=valores[i].unidadesVendidas;
						}
					};
					cadena+="<tr>";
					cadena+="<td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+nomProducto+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+unidadesVendidas+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+precio+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+gananciaTotal+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+comisionTotal+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+comisionImpuesta+"</td>";
					cadena+="</tr>";
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