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
					cadena=cadena+"<select class='inpt_txt' name='city' id='strings_editar2'>";
					for(i=0;i<array.length;i++)
					{
						cadena=cadena+"<option value='"+array[i].idMpio+"'>"+array[i].descripcion+"</option>";
					}
					cadena=cadena+"</select>";
					$("#selectMunicipios").html(cadena);
				}
			});
	}