<?php
include_once("m_query_consulta.php");
class nuevo extends conexion {
function todo(){
	error_reporting(0);
	if(isset($_POST['buscar']))
	$busca= $_POST['buscar'];
	if($busca!=''){ #Llamo el dato buscar del formulario para hacer la busqueda en el query
	$query = "SELECT idtproducto, nombre_pro, existencia_pro, estatus_pro, categoria_tipo FROM tproducto natural join ttipo where nombre_pro like '%".$buscar."%'";
	$resultado = mysql_query($query);}
	else{
		$query="SELECT idtproducto, nombre_pro, existencia_pro,  categoria_tipo FROM tproducto natural join ttipo";
		$resultado = mysql_query($query);

		$resultado = mysql_query($query);
	}
}
}
?>