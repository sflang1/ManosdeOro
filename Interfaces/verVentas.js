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
					var unidadesVendidas=0;
					var nomProducto="";
					var precio="";
					var cadena="<table>";
					cadena+="<th>Nombre del producto</th><th>Unidades Vendidas en Total</th><th>Precio por unidad</th><th>Ventas totales</th>";
					cadena+="<th>Comisión manos de oro</th>";
					for (var i = valores.length - 1; i >= 0; i--) 
					{
						if(idActual==valores[i].idProducto)
						{
							//Calcular ganancia total y comisión ganada
							nomProducto=valores[i].nomProducto;
							unidadesVendidas=unidadesVendidas+parseFloat(valores[i].unidadesVendidas);
							gananciaTotal=gananciaTotal+(valores[i].unidadesVendidas*valores[i].precio);
							comisionTotal=comisionTotal+(valores[i].unidadesVendidas*valores[i].precio*valores[i].comision/100);
							precio=valores[i].precio;
							stock=valores[i].stock;
						}
						else
						{
							alert("Se cambia el ID");
							cadena+="<tr>";
							cadena+="<td>"+nomProducto+"</td><td>"+unidadesVendidas+"</td><td>"+precio+"</td><td>"+gananciaTotal+"</td><td>"+comisionTotal+"</td>";
							cadena+="</tr>";
							idActual=valores[i].idProducto;
							gananciaTotal=(valores[i].unidadesVendidas*valores[i].precio);
							comisionTotal=(valores[i].unidadesVendidas*valores[i].precio*valores[i].comision/100);
							unidadesVendidas=valores[i].unidadesVendidas;
						}
					};
					cadena+="<tr>";
					cadena+="<td>"+nomProducto+"</td><td>"+unidadesVendidas+"</td><td>"+precio+"</td><td>"+gananciaTotal+"</td><td>"+comisionTotal+"</td>";
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