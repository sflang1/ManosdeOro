function validarForm()
{
	var rut=document.getElementById("rut").value;
	var camcom=document.getElementById("camcom").value;
	var foto=document.getElementById("foto").value;
	var extensionrut=rut.substring(rut.lastIndexOf(".")+1);
	var extensioncamcom=camcom.substring(camcom.lastIndexOf(".")+1);
	var extensionfoto=foto.substring(foto.lastIndexOf(".")+1);
	var errores="Errores detectados en el formulario: \n";
	var bool=true;
	if((extensionrut!="pdf"))
	{
		errores=errores+"El archivo RUT es inválido. \n";
		bool=false;
	}
	if(extensioncamcom!="pdf")
	{
		errores=errores+"El archivo de Cámara de Comercio es inválido. \n"
		bool=false;
	}
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