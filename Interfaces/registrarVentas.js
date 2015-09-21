function validacionForm(id)
{
	var largoventas=document.getElementById("numero"+id).value;
	if(largoventas.length==0)
	{
		alert("Error, debes poner un número de ventas para continuar");
		return false;
	}
	else
	{
		return true;
	}
}