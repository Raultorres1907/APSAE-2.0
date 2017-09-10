
function fagregar(){

	var i=0;
	var cont_rep = 0;

		var envia = document.getElementById('idttipo');
    nombre = envia.options[envia.selectedIndex].text;


    var categoria = document.getElementById('idttipo').value;
    var nombre = document.getElementById('nombre').value;
    var cantidad = document.getElementById('cantidad').value;
	//    var tipo = document.getElementById('tipo2').value;
   if(categoria==0)
    	{alert("Falta Categoria");}
    if(nombre=="")
    {
    	alert("Falta el nombre");
    }
    if(cantidad=="")
    {
    	alert("Falta Cantidad");
    }
	


	tabla = document.getElementById("detalle");

	for(var j =0 ; j<tabla.rows.length;j++){
			
				//usamos chilNodes para entrar al nodo adentro de la celda, y su correspondiente posicion
		
	} 

	 if(cont_rep==0){

		tr = tabla.insertRow(-1);												
		td0 = tr.insertCell(0);													
		td1 = tr.insertCell(1);	
		td2 = tr.insertCell(2);	
		td3 = tr.insertCell(3);	
	

		contador_bienes = document.getElementById("cont_bie"); 
		contador_bienes.value = parseInt(contador_bienes.value) + 1;
		td0.innerHTML = "<input type='text' value='"+nombre+"' style='border:transparent;background-color: transparent;' size='10%' readOnly name='nombre"+contador_bienes.value+"'>";
		td1.innerHTML = "<input type='hidden' value='"+categoria+"'><input type='text' value='"+categoria+"' style='border:transparent;background-color: transparent;position:left;' readOnly name='idttipo"+contador_bienes.value+"'>"; 
		td2.innerHTML = "<input type='hidden' value='"+cantidad+"'><input type='text' value='"+cantidad+"' style='border:transparent;background-color: transparent;width: 95%' readOnly name='cantidad"+contador_bienes.value+"'>";
		td3.innerHTML = "<button type='button' onclick='quitar(this.parentNode)' value='del' class='btn btn-danger' name='delService'>ELIMINAR</button>";

		i++; //aumentamos la i
	}else{
		alert("No puedes agregar dos veces "+nombre+"!");
	}
}


function quitar(nodoPadre){nodoPadre.parentNode.remove(); contador_bienes = document.getElementById("cont_bie"); contador_bienes.value = parseInt(contador_bienes.value) - 1;}

function incluir()
{
	document.registrar.submit();
}