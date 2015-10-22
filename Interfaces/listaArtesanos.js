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
				cadena=cadena+"<tr><td>Nombre</td><td>Número de documento</td><td>Dirección</td><td>Teléfono</td><td>Celular</td><td>Email</td><td></td></tr>";
				var valores=result.valores;
				for (var i = valores.length - 1; i >= 0; i--) {
				cadena=cadena+"<tr><td>"+valores[i].nombre+"</td><td>"+valores[i].nroDoc+"</td><td>"+valores[i].direccion+"</td><td>"+valores[i].telefono+"</td><td>"+valores[i].celular+"</td><td>"+valores[i].email+"</td></tr>"
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
					cadena=cadena+"<tr><td>Nombre</td><td>Número de documento</td><td>Dirección</td><td>Teléfono</td><td>Celular</td><td>Email</td><td></td></tr>";
					var valores=result.valores;
					for (var i = valores.length - 1; i >= 0; i--) {
						cadena=cadena+"<tr><td>"+valores[i].nombre+"</td><td>"+valores[i].nroDoc+"</td><td>"+valores[i].direccion+"</td><td>"+valores[i].telefono+"</td><td>"+valores[i].celular+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Modificar' onclick='window.location.href=\"modificarArtesano.php?idArtesano="+valores[i].idArtesano+"\"'></td></tr>"
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
		campoEntrada.innerHTML="<input type='text' id='busqueda' onkeyup='buscar()'>";
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
			cadena=cadena+"<tr><td>Nombre</td><td>Número de documento</td><td>Dirección</td><td>Teléfono</td><td>Celular</td><td>Email</td><td></td></tr>";
			var valores=result.valores;
			for (var i = valores.length - 1; i >= 0; i--) {
				cadena=cadena+"<tr><td>"+valores[i].nombre+"</td><td>"+valores[i].nroDoc+"</td><td>"+valores[i].direccion+"</td><td>"+valores[i].telefono+"</td><td>"+valores[i].celular+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Modificar' onclick='window.location.href=\"modificarArtesano.php?idArtesano="+valores[i].idArtesano+"\"'></td></tr>"
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