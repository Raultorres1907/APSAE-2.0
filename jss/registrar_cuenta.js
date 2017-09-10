function fregistro()
{
	var cedula, nombre, apellido, correo, usuario, clave, clave2, nivel, estatus, pregunta, respuesta;
	cedula = document.getElementById('cedula').value;
	nombre = document.getElementById('nombre').value;
	apellido = document.getElementById('apellido').value;
	correo = document.getElementById('correo').value;
	usuario = document.getElementById('usuario').value;
	clave = document.getElementById('clave').value;
	clave2 = document.getElementById('clave2').value;
	nivel = document.getElementById('nivel').value;
	estatus = document.getElementById('status').value;
	pregunta= document.getElementById('pregunta').value;
	respuesta = document.getElementById('respuesta').value;
	

 if(cedula == ""){
	alert("Falta el cedula");
	return false;}
else if(nombre == ""){
	alert("Falta el nombre");
		return false;
	}
	else if(apellido == ""){
	alert("Falta el apellido");
		return false;
	}else if(correo == ""){
	alert("Falta el correo");
		return false;
	}else if(usuario == ""){
	alert("Falta el usuario");
		return false;
	}else if(clave == ""){
	alert("Falta la clave");
		return false;
	}else if(clave2 == ""){
	alert("Confirme la clave");
		return false;
	}else if(nivel == ""){
	alert("Falta el nivel");
		return false;
	}else if(estatus == ""){
	alert("Falta el estado");
		return false;
	}else if(pregunta == ""){
	alert("Coloque su pregunta");
		return false;
	}else if(respuesta == ""){
	alert("Coloque su respuesta");
		return false;}
	else if(clave == clave2)
	{
		alert("Registro con exito");
		document.regis.submit();
	}
	else if(clave != clave2)
	{
		alert("Las claves no son iguales");
	}
	
	
}