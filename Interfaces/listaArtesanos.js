function buscar()
{
	var criterio=document.getElementById("selectBuscar").options[document.getElementById("selectBuscar").selectedIndex].value;
	if(criterio!=2)
	{
		var busqueda=document.getElementById("busqueda").value;	
	}
	else
	{
		var busqueda=document.getElementById("selectMpios").options[document.getElementById("selectMpios").selectedIndex].value;
	}
	
	$.getJSON("../Logica/buscarArtesanosPorCriterio.php?criterio="+criterio+"&busqueda="+busqueda,
		function (result)
		{
			if(result.exito==1)
			{
				cadena="";
				cadena=cadena+"<table>";
				cadena=cadena+"<th colspan='6'>Lista de artesanos</th>";
				cadena=cadena+"<tr><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Nombre</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Número de documento</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Dirección</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Teléfono</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Celular</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Email</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Ciudad</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Departamento</td></tr>";
				var valores=result.valores;
				for (var i = valores.length - 1; i >= 0; i--) {
				cadena=cadena+"<tr><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nombre+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nroDoc+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].direccion+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].telefono+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].celular+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].email+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].ciudad+"</td><td style='text-align: right; border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].departamento+"</td></tr>"
				};
				cadena=cadena+"</table>";
				$("#lista").html(cadena);
			}
			else
			{
				alert("Error recuperando admins");
			}
		});
		
	
	
}
function limpiarBusqueda()
{
	var criterio=document.getElementById("selectBuscar").options[document.getElementById("selectBuscar").selectedIndex].value;
	var campoEntrada=document.getElementById("campoEntrada");
	if(criterio==2)
	{
		
		campoEntrada.innerHTML="<div id='selectDeptos'></div> <div id='selectMunicipios'></div>";
		$.getJSON("../Logica/obtenerDepartamentos.php",
			function (result)
			{
				if(result.exito==1)
				{
					cadena="";
					cadena+="<select onChange='getMunicipios()' id='selectDepartamentos'>";
					var valores=result.valores;
					for (var i = 0; i<valores.length; i++) {
						cadena+="<option value='"+valores[i].idDpto+"'>"+valores[i].descripcion+"</option>";
					};
					cadena+="</select>";
					$("#selectDeptos").html(cadena);
				}
			});
		$.getJSON("../Logica/obtenerMunicipioPorDepto.php?id_depto=1",
			function (result)
			{
				cadena="";
				if(result.exito==1)
				{
					
					array=result.valores;
					cadena=cadena+"<select onChange='buscar()' id='selectMpios'>";
					for(i=0;i<array.length;i++)
					{
						cadena=cadena+"<option value='"+array[i].idMpio+"'>"+array[i].descripcion+"</option>";
					}
					cadena=cadena+"</select>";
					$("#selectMunicipios").html(cadena);
				}
			});
		$.getJSON("../Logica/buscarArtesanosPorCriterio.php?criterio=2&busqueda=1",
			function (result)
			{
				if(result.exito==1)
				{
					cadena="";
					cadena=cadena+"<table>";
					cadena=cadena+"<th colspan='7'>Lista de artesanos</th>";
					cadena=cadena+"<tr><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Nombre</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Número de documento</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Dirección</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Teléfono</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Celular</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Email</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Ciudad</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Departamento</td></tr>";
					var valores=result.valores;
					for (var i = valores.length - 1; i >= 0; i--) {
						cadena=cadena+"<tr><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nombre+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nroDoc+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].direccion+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].telefono+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].celular+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].email+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].ciudad+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].departamento+"</td></tr>"
					};
					cadena=cadena+"</table>";
					$("#lista").html(cadena);
				}
				else
				{
					alert("Error recuperando admins");
				}
			});
		
	}
	else
	{
		campoEntrada.innerHTML="<input type='text' id='busqueda' onkeyup='buscar()' placeholder='Introduzca la Busqueda'>";
		var busqueda=document.getElementById("busqueda");
		busqueda.value="";
	}
	$.getJSON("../Logica/listarArtesanos.php",
	function (result)
	{
		if(result.exito==1)
		{
			cadena="";
			cadena=cadena+"<table>";
			cadena=cadena+"<th colspan='6'>Lista de artesanos</th>";
			cadena=cadena+"<tr><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Nombre</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Número de documento</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Dirección</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Teléfono</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Celular</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Email</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Ciudad</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>Departamento</td></tr>";
			var valores=result.valores;
			for (var i = valores.length - 1; i >= 0; i--) {
				cadena=cadena+"<tr><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nombre+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].nroDoc+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].direccion+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].telefono+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].celular+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].email+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].ciudad+"</td><td style='border: 1px solid black; border-collapse: collapse; padding:5px;'>"+valores[i].departamento+"</td></tr>"
			};
			cadena=cadena+"</table>";
			$("#lista").html(cadena);
		}
		else
		{
			alert("Error recuperando admins");
		}
	});
}

function getMunicipios()
{
	var depID=document.getElementById("selectDepartamentos").value;
		$.getJSON("../Logica/obtenerMunicipioPorDepto.php?id_depto="+depID,
			function (result)
			{
				cadena="";
				if(result.exito==1)
				{
					
					array=result.valores;
					cadena=cadena+"<select onChange='buscar()' id='selectMpios'>";
					for(i=0;i<array.length;i++)
					{
						cadena=cadena+"<option value='"+array[i].idMpio+"'>"+array[i].descripcion+"</option>";
					}
					cadena=cadena+"</select>";
					$("#selectMunicipios").html(cadena);
				}
			});
}