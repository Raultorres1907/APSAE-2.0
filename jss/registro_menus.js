function fagregar(){

	var i=0;
	var cont_rep = 0;


	var envia = document.getElementById('idtproducto');
    nombre = envia.options[envia.selectedIndex].text;


    var id = document.getElementById('idtproducto').value;
    var cantidad = document.getElementById('existencia_pro').value;
 

    if(id==0)
    	{alert("Falta ingrediente");}
    if(cantidad=="")
    {
    	alert("Falta gramaje");
    }
	tabla = document.getElementById("detalle");
	//----ESTE FOR ES UTILIZADO PARA NO REPETIR LOS PRODUCTOS QUE SE VAN A GUARDAR
	for(var j =0 ; j<tabla.rows.length;j++){
			
				//usamos chilNodes para entrar al nodo adentro de la celda, y su correspondiente posicion
				if(document.all){
					cod_temp = tabla.rows[j].cells[0].innerText;
				}else{
					cod_temp = tabla.rows[j].cells[0].textContent;
				}

				if(cod_temp == id){
					cont_rep++;
				}
			
	}



 

	 if(cont_rep==0){

		tr = tabla.insertRow(-1);												
		td0 = tr.insertCell(0);													
		td1 = tr.insertCell(1);	
		td2 = tr.insertCell(2);	
		td3 = tr.insertCell(3);		
	

		contador_bienes = document.getElementById("cont_bie"); 
		contador_bienes.value = parseInt(contador_bienes.value) + 1;
		td0.innerHTML = "<input type='text' value='"+id+"' style='border:transparent;background-color: transparent' readOnly name='idtproducto"+contador_bienes.value+"'>"; 
		td1.innerHTML = "<input type='text' value='"+nombre+"' style='border:transparent;background-color: transparent;width: 100%' readOnly name='nombre"+contador_bienes.value+"'>";
		td2.innerHTML = "<input type='text' value='"+cantidad+"' style='border:transparent;background-color: transparent' readOnly name='existencia_pro"+contador_bienes.value+"'>";
		td3.innerHTML = "<button type='button' onclick='quitar(this.parentNode)' value='del' class='btn btn-danger' name='delService'>ELIMINAR</button>";

 i++; //aumentamos la i
	}else{
		alert("No puedes agregar dos veces "+nombre+"!");
	}

}
function nuevoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}

	catch(e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		catch(E){
			xmlhttp = false;
		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}
	
	return xmlhttp;
}

function quitar(nodoPadre){nodoPadre.parentNode.remove(); contador_bienes = document.getElementById("cont_bie"); contador_bienes.value = parseInt(contador_bienes.value) - 1;}

function fguardar()
{
	document.menu.submit();
}