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
					cadena=cadena+"<select name='city' id='strings_editar2'>";
					for(i=0;i<array.length;i++)
					{
						cadena=cadena+"<option value='"+array[i].idMpio+"'>"+array[i].descripcion+"</option>";
					}
					cadena=cadena+"</select>";
					$("#selectMunicipios").html(cadena);
				}
			});
	}
function validacionForm()
{
	var primerNom=document.getElementById("primerNom").value;
	var primerApe=document.getElementById("primerApe").value;
	var docId=document.getElementById("docId").value;
	var password=document.getElementById("password").value;
	var direccion=document.getElementById("direccion").value;
	var telefono=document.getElementById("telefono").value;
	var celular=document.getElementById("celular").value;
	var empresa=document.getElementById("empresa").value;
	var nroenvio=document.getElementById("nroenvio").value;
	var link=document.getElementById("link").value;
	var descripcion=document.getElementById("descripcion").value;ç
	var errores="Errores en el formulario: <br>"
	var correcto=true;
	if(primerNom.length==0||primerNom==null)
	{
		errores=errores+"Primer nombre vacío <br>";
		correcto=false;
	}
	if(primerApe.length==0||primerApe==null)
	{
		errores=errores+"Primer apellido vacío <br>";
		correcto=false;
	}
	if(docId.length==0||docId==null)
	{
		errores=errores+"Documento de identidad vacío <br>";
		correcto=false;
	}
	if(password.length==0||password==null)
	{
		errores=errores+"Contraseña vacía <br>";
		correcto=false;
	}
	if(direccion.length==0||direccion==null)
	{
		errores=errores+"Dirección vacía <br>";
		correcto=false;
	}
	if(telefono.length==0||telefono==null)
	{
		errores=errores+"Teléfono vacío <br>";
		correcto=false;
	}
	if(celular.length==0||celular==null)
	{
		errores=errores+"Celular vacío <br>";
		correcto=false;
	}
	if(empresa.length==0||empresa==null)
	{
		errores=errores+"Nombre de la empresa de envío vacío <br>";
		correcto=false;
	}
	if(nroenvio.length==0||nroenvio==null)
	{
		errores=errores+"Número de envío del producto vacío <br>";
		correcto=false;
	}
	if(descripcion.length==0||descripcion==null)
	{
		errores=errores+"Descripción del producto vacía <br>";
		correcto=false;
	}
	if(link.length==0||link==null)
	{
		errores=errores+"Link vacío <br>";
		correcto=false;
	}
	if(!correcto)
	{
		
		var errhtml=document.getElementById("errores");
		errhtml.html=errores;

	}
	return correcto
}