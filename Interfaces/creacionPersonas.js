var contenido=document.getElementById("contenido");
contenido.innerHTML="<h1 id='titulos_inicio_sesion'>Creación de la cuenta de usuario</h1><h1 id='titulos_noti'>Por favor, llene el siguiente formulario. Los campos con * son obligatorios</h1><form method='POST' action='../Logica/registrarArtesano.php' onsubmit='return validacionForm()'><table><input type='hidden' name='origen' value='1'><tr><td colspan='2' id='strings_editar_rojo'>Información básica sobre el Usuario:</td></tr><tr><td id='strings_editar'>Primer nombre (*)</td><td><input type='text' id='primerNom' name='primerNom' required></td></tr><tr><td id='strings_editar'>Segundo nombre</td><td><input type='text' name='segundoNom'></td></tr><tr><td id='strings_editar'>Primer apellido (*)</td><td><input type='text' id='primerApe' name='primerApe' required></td></tr><tr><td id='strings_editar'>Segundo apellido</td><td><input type='text' name='segundoApe'></td></tr><tr><td id='strings_editar'>Documento de identidad (*)</td><td><select name='tipo' id='strings_editar'><option value='0'>Cédula de Ciudadanía</option><option value='1'>Cédula de Extranjería</option><option value='2'>Tarjeta de Identidad</option><option value='3'>Registro Civil</option><option value='4'>Número de pasaporte</option></select><input type='text' id='docId' name='nroDoc' required></td></tr><tr><td colspan='2' id='strings_editar_rojo'>Recuerde que su nombre de usuario será su documento de identidad sin ningún guión ni elemento adicional.</td></tr><tr><td id='strings_editar'>Contraseña (*)</td><td><input type='password' id='password' name='password' required></td></tr><tr><td id='strings_editar'>Dirección (*)</td><td><input type='text' id='direccion' name='direccion' required></td></tr><tr><td id='strings_editar'>Teléfono (*)</td><td><input type='text' name='telefono' id='telefono' required></td></tr><tr><td id='strings_editar'>Celular (*)</td><td><input type='text' name='celular' id='celular' required></td></tr><tr><td id='strings_editar'>Correo electrónico(*):</td><td><input type='email' name='email' required></td></tr><tr><td colspan='2' id='strings_editar_rojo'>Información adicional del Usuario:</td></tr><tr><td id='strings_editar'>¿Tiene certificación de su oficio por el Sena? (*)</td><td><input type='radio' name='certificacion' value='0' checked> No<input type='radio' name='certificacion' value='1'>Sí</td></tr><tr><td id='strings_editar'>Escoja su nivel de estudio. Debe haber terminado el nivel de estudio seleccionado: (*)</td><td><select name='estudios'><option value='0'>Ninguno</option><option value='1'>Primaria</option><option value='2'>Bachillerato</option><option value='3'>Técnico</option><option value='4'>Tecnológico</option><option value='5'>Universitario</option></select></td></tr><tr><td colspan='2' id='strings_editar_rojo'>Información del Producto:</td></tr><tr><td id='strings_editar'>¿Deseas que tu producto se muestre en la tienda virtual? (*)</td><td><input type='radio' name='mostrar' value='0'> No<input type='radio' name='mostrar' value='1' checked>Sí</td></tr><tr><td id='strings_editar'>Empresa por la que envía el producto (*)</td><td><input type='text' name='empresa' id='empresa' required></td></tr><tr><td id='strings_editar'>Número de envío (*)</td><td><input type='text' name='nroenvio' id='nroenvio' required></td></tr><tr><td id='strings_editar'>Descripción del producto (*)</td><td><input type='text' name='descripcion' id='descripcion' height='6em;' required></td></tr><tr><td id='strings_editar'>Link. Agrega un video que contenga más información:</td><td><input type='url' name='link' id='link'></td></tr><tr><td colspan='2' id='strings_editar'>La URL debe tener http o https. Sugerencia: Copia y pega el link del navegador</td></tr><tr><td colspan='2'><input id='boton_iniciar' type='submit' value='Aceptar'></td></tr></table></form><div id='errores'></div>"

function cambiar()
{
	var valor=document.getElementById("selectPerfil").value;
	var actual=document.getElementById("adm");
	var valor2=document.getElementById("selectAccion").value;
	var contenido=document.getElementById("contenido");
	var cadena="";
	if(valor==-1)
	{
		//Artesanos
		switch(valor2)
		{
			case "0":
				contenido.innerHTML="<h1 id='titulos_inicio_sesion'>Creación de la cuenta de usuario</h1><h1 id='titulos_noti'>Por favor, llene el siguiente formulario. Los campos con * son obligatorios</h1><form method='POST' action='../Logica/registrarArtesano.php' onsubmit='return validacionForm()'><table><input type='hidden' name='origen' value='1'><tr><td colspan='2' id='strings_editar_rojo'>Información básica sobre el Usuario:</td></tr><tr><td id='strings_editar'>Primer nombre (*)</td><td><input type='text' id='primerNom' name='primerNom' required></td></tr><tr><td id='strings_editar'>Segundo nombre</td><td><input type='text' name='segundoNom'></td></tr><tr><td id='strings_editar'>Primer apellido (*)</td><td><input type='text' id='primerApe' name='primerApe' required></td></tr><tr><td id='strings_editar'>Segundo apellido</td><td><input type='text' name='segundoApe'></td></tr><tr><td id='strings_editar'>Documento de identidad (*)</td><td><select name='tipo' id='strings_editar'><option value='0'>Cédula de Ciudadanía</option><option value='1'>Cédula de Extranjería</option><option value='2'>Tarjeta de Identidad</option><option value='3'>Registro Civil</option><option value='4'>Número de pasaporte</option></select><input type='text' id='docId' name='nroDoc' required></td></tr><tr><td colspan='2' id='strings_editar_rojo'>Recuerde que su nombre de usuario será su documento de identidad sin ningún guión ni elemento adicional.</td></tr><tr><td id='strings_editar'>Contraseña (*)</td><td><input type='password' id='password' name='password' required></td></tr><tr><td id='strings_editar'>Dirección (*)</td><td><input type='text' id='direccion' name='direccion' required></td></tr><tr><td id='strings_editar'>Teléfono (*)</td><td><input type='text' name='telefono' id='telefono' required></td></tr><tr><td id='strings_editar'>Celular (*)</td><td><input type='text' name='celular' id='celular' required></td></tr><tr><td id='strings_editar'>Correo electrónico(*):</td><td><input type='email' name='email' required></td></tr><tr><td colspan='2' id='strings_editar_rojo'>Información adicional del Usuario:</td></tr><tr><td id='strings_editar'>¿Tiene certificación de su oficio por el Sena? (*)</td><td><input type='radio' name='certificacion' value='0' checked> No<input type='radio' name='certificacion' value='1'>Sí</td></tr><tr><td id='strings_editar'>Escoja su nivel de estudio. Debe haber terminado el nivel de estudio seleccionado: (*)</td><td><select name='estudios'><option value='0'>Ninguno</option><option value='1'>Primaria</option><option value='2'>Bachillerato</option><option value='3'>Técnico</option><option value='4'>Tecnológico</option><option value='5'>Universitario</option></select></td></tr><tr><td colspan='2' id='strings_editar_rojo'>Información del Producto:</td></tr><tr><td id='strings_editar'>¿Deseas que tu producto se muestre en la tienda virtual? (*)</td><td><input type='radio' name='mostrar' value='0'> No<input type='radio' name='mostrar' value='1' checked>Sí</td></tr><tr><td id='strings_editar'>Empresa por la que envía el producto (*)</td><td><input type='text' name='empresa' id='empresa' required></td></tr><tr><td id='strings_editar'>Número de envío (*)</td><td><input type='text' name='nroenvio' id='nroenvio' required></td></tr><tr><td id='strings_editar'>Descripción del producto (*)</td><td><input type='text' name='descripcion' id='descripcion' height='6em;' required></td></tr><tr><td id='strings_editar'>Link. Agrega un video que contenga más información:</td><td><input type='url' name='link' id='link'></td></tr><tr><td colspan='2' id='strings_editar'>La URL debe tener http o https. Sugerencia: Copia y pega el link del navegador</td></tr><tr><td colspan='2'><input id='boton_iniciar' type='submit' value='Aceptar'></td></tr></table></form><div id='errores'></div>"
				break;
			case "1":
				$.getJSON("../Logica/listarArtesanos.php",
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
							$("#contenido").html(cadena);
						}
						else
						{
							alert("Error recuperando admins");
						}
					});
				break;
			case "2":
				$.getJSON("../Logica/listarArtesanos.php",
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
								cadena=cadena+"<tr><td>"+valores[i].nombre+"</td><td>"+valores[i].nroDoc+"</td><td>"+valores[i].direccion+"</td><td>"+valores[i].telefono+"</td><td>"+valores[i].celular+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Eliminar' onclick='eliminarArtesano("+valores[i].idArtesano+")'></td></tr>"
							};
							cadena=cadena+"</table>";
							$("#contenido").html(cadena);
						}
						else
						{
							alert("Error recuperando admins");
						}
					});
				break;
		}
		actual.value=0;
	}
	else
	{
		switch(valor2)
		{
			case "0":
				cadena="";
				cadena=cadena+"<h1 id='titulos_inicio_sesion'>Creación de la cuenta de administrador</h1>";
				cadena=cadena+"<h1 id='titulos_noti'>Por favor, llene el siguiente formulario. Los campos con * son obligatorios</h1>";
				cadena=cadena+"<table>";
				cadena=cadena+"<tr><td id='strings_editar'>Primer Nombre:(*)</td><td><input type='text' id='primerNom' required></td></tr>";
				cadena=cadena+"<tr><td id='strings_editar'>Segundo Nombre:</td><td><input type='text' id='segundoNom'></td></tr>";
				cadena=cadena+"<tr><td id='strings_editar'>Primer Apellido:(*)</td><td><input type='text' id='primerApe' required></td></tr>";
				cadena=cadena+"<tr><td id='strings_editar'>Segundo Apellido:</td><td><input type='text' id='segundoApe'></td></tr>";
				cadena=cadena+"<tr><td id='strings_editar'>Nombre de Usuario:(*)</td><td><input type='text' id='username' required></td></tr>";
				cadena=cadena+"<tr><td id='strings_editar'>Contraseña:(*)</td><td><input type='password' id='password' required></td></tr>";
				cadena=cadena+"<tr><td id='strings_editar'>Email:(*)</td><td><input type='email' id='email' required></td></tr>";
				cadena=cadena+"<tr><td colspan='2'><input type='button' id='boton_iniciar' value='Enviar' onclick='crearAdministrador()'></td></tr>";
				contenido.innerHTML=cadena;
				break;
			case "1":
				$.getJSON("../Logica/listarAdmins.php",
					function (result)
					{
						if(result.exito==1)
						{
							cadena="";
							cadena=cadena+"<table>";
							cadena=cadena+"<th colspan='7'>Lista de administradores</th>";
							cadena=cadena+"<tr><td>Primer nombre</td><td>Segundo nombre</td><td>Primer apellido</td><td>Segundo apellido</td><td>Nombre de Usuario</td><td>Email</td><td></td></tr>";
							var valores=result.valores;
							for (var i = valores.length - 1; i >= 0; i--) {
								cadena=cadena+"<tr><td>"+valores[i].primerNom+"</td><td>"+valores[i].segundoNom+"</td><td>"+valores[i].primerApe+"</td><td>"+valores[i].segundoApe+"</td><td>"+valores[i].username+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Modificar' onclick='window.location.href=\"modificarAdmin.php?idAdministrador="+valores[i].idAdmin+"\"'></td></tr>"
							};

							cadena=cadena+"</table>";
							$("#contenido").html(cadena);
						}
						else
						{
							alert("Error recuperando admins");
						}
					});
				break;
			case "2":
				$.getJSON("../Logica/listarAdmins.php",
					function (result)
					{
						if(result.exito==1)
						{
							cadena="";
							cadena=cadena+"<table>";
							cadena=cadena+"<th colspan='7'>Lista de administradores</th>";
							cadena=cadena+"<tr><td>Primer nombre</td><td>Segundo nombre</td><td>Primer apellido</td><td>Segundo apellido</td><td>Nombre de Usuario</td><td>Email</td><td></td></tr>";
							var valores=result.valores;
							for (var i = valores.length - 1; i >= 0; i--) {
								cadena=cadena+"<tr><td>"+valores[i].primerNom+"</td><td>"+valores[i].segundoNom+"</td><td>"+valores[i].primerApe+"</td><td>"+valores[i].segundoApe+"</td><td>"+valores[i].username+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Eliminar' onclick='eliminarAdmin("+valores[i].idAdmin+")'></td></tr>"
							};

							cadena=cadena+"</table>";
							$("#contenido").html(cadena);
						}
						else
						{
							alert("Error recuperando admins");
						}
					});
				break;
		}
		actual.value=1;
	}


}
function crearAdministrador()
{
	var perfil=document.getElementById("selectPerfil").value;
	var primerNom=document.getElementById("primerNom").value;
	var segundoNom=document.getElementById("segundoNom").value;
	var primerApe=document.getElementById("primerApe").value;
	var segundoApe=document.getElementById("segundoApe").value;
	var username=document.getElementById("username").value;
	var password=document.getElementById("password").value;
	var email=document.getElementById("email").value;
	$.getJSON("../Logica/creacionAdministrador.php?primerNom="+primerNom+"&segundoNom="+segundoNom+"&primerApe="+primerApe+"&segundoApe="+segundoApe+"&username="+username+"&password="+password+"&email="+email+"&tipo="+perfil,
		function (result)
		{
			if(result.exito==1)
			{
				alert("Administrador creado exitosamente");
			}
			else
			{
				alert("Administrador no fue creado");
			}
		});
}
function eliminarAdmin(idAdmin)
{
	if(confirm("¿Realmente desea eliminar este administrador?"))
	{
		$.getJSON("../Logica/eliminarAdmin.php?idAdmin="+idAdmin,
			function (result)
			{
				cadena="";
				cadena=cadena+"<table>";
				cadena=cadena+"<th colspan='7'>Lista de administradores</th>";
				cadena=cadena+"<tr><td>Primer nombre</td><td>Segundo nombre</td><td>Primer apellido</td><td>Segundo apellido</td><td>Nombre de Usuario</td><td>Email</td><td></td></tr>"
				var valores=result.valores;
				for (var i = valores.length - 1; i >= 0; i--) {
					cadena=cadena+"<tr><td>"+valores[i].primerNom+"</td><td>"+valores[i].segundoNom+"</td><td>"+valores[i].primerApe+"</td><td>"+valores[i].segundoApe+"</td><td>"+valores[i].username+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Eliminar' onclick='eliminarAdmin("+valores[i].idAdmin+")'></td></tr>"
				};
				cadena=cadena+"</table>";
				$("#contenido").html(cadena);
				if(result.exito==1)
				{
					alert("Administrador eliminado exitosamente");
				}
				else
				{
					alert("El administrador no fue eliminado");
				}
			});
	}
}
function eliminarArtesano(idArtesano)
{
	if(confirm("¿Realmente desea eliminar este artesano? Recuerde que al borrarlo eliminará del sistema también a los productos que ha registrado este artesano"));
	{
		$.getJSON("../Logica/eliminarArtesano.php?idArtesano="+idArtesano,
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
								cadena=cadena+"<tr><td>"+valores[i].nombre+"</td><td>"+valores[i].nroDoc+"</td><td>"+valores[i].direccion+"</td><td>"+valores[i].telefono+"</td><td>"+valores[i].celular+"</td><td>"+valores[i].email+"</td><td><input type='button' value='Eliminar' onclick='eliminarArtesano("+valores[i].idArtesano+")'></td></tr>"
							};
							cadena=cadena+"</table>";
							$("#contenido").html(cadena);
						}
						else
						{
							alert("Error recuperando admins");
						}
					});
	}
}
function cambiarPerfiles()
{
	var select=document.getElementById("selectPerfil");
	var valor=select.value;
	var actual=document.getElementById("adm").value;
	var check1=document.getElementById("checkCursos");
	var check2=document.getElementById("checkPerflies");
	var check3=document.getElementById("checkReservas");
	var check4=document.getElementById("checkVentas");
	var check5=document.getElementById("checkProducto");
	var check6=document.getElementById("checkAdicionales");
	if(valor==-1)
	{
		check1.checked=false;
		check2.checked=false;
		check3.checked=false;
		check4.checked=false;
		check5.checked=false;
		check6.checked=false;
		if(actual==1)
		{
			cambiar();
		}
	}
	if(valor!=-1&&actual==0)
	{
		cambiar();
	}
	if(valor==0)
	{
		check1.checked=true;
		check2.checked=true;
		check3.checked=true;
		check4.checked=true;
		check5.checked=true;
		check6.checked=true;
	}
	if(valor==1)
	{
		check1.checked=false;
		check2.checked=false;
		check3.checked=false;
		check4.checked=true;
		check5.checked=false;
		check6.checked=false;
	}
	if(valor>2)
	{
		check6.checked=false;
		valor=valor-2;
		if((valor&1)!=0)
		{
			check1.checked=true;
		}
		else
		{
			check1.checked=false;
		}
		if((valor&2)!=0)
		{
			check2.checked=true;
		}
		else
		{
			check2.checked=false;
		}
		if((valor&4)!=0)
		{
			check3.checked=true;
		}
		else
		{
			check3.checked=false;
		}
		if((valor&8)!=0)
		{
			check4.checked=true;
		}
		else
		{
			check4.checked=false;
		}
		if((valor&16)!=0)
		{
			check5.checked=true;
		}
		else
		{
			check5.checked=false;
		}
	}
}