
function dimePropiedades(){ 
	
	var select=document.getElementById("miSelect");
	var indice=select.selectedIndex;
	var seleccionado=select.options[indice].value;
	var i=0;
	for(i=1;i<41;i++)
	{
		var cuadrado=document.getElementById("square"+i);
		cuadrado.style.background='#FFFFFF';
	}
	var square=document.getElementById("square"+seleccionado);
	square.style.background='#ff0000';
   	
};

function dimePropiedades2(){ 
	var select=document.getElementById("miSelect2");
	var indice=select.selectedIndex;
	var seleccionado=select.options[indice].value;
	var i=0;
	for(i=41;i<61;i++)
	{
		var cuadrado=document.getElementById("square"+i);
		cuadrado.style.background='#FFFFFF';
	}
	var square=document.getElementById("square"+seleccionado);
	square.style.background='#ff0000';
   	
};