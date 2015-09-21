function validarForm()
{
	var foto=document.getElementById("foto").value;
	var extensionfoto=foto.substring(foto.lastIndexOf(".")+1);
	var errores="Errores detectados en el formulario: \n";
	var bool=true;
	if((extensionfoto!="jpg")&&(extensionfoto!="png"))
	{
		errores=errores+"La foto subida debe estar en formato .jpg o .png \n";
		bool=false;
	}		
	if(!bool)
	{
		alert(errores);
	}
	return bool;
}