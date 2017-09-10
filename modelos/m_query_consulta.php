<?php

class conexion {
	function todo(){
	$pc = "localhost";
	$usu = "root";
	$cla = ""; #Se coloca la clave de la base de datos
	$bd = "db_appae";
	
	$co= mysql_connect($pc, $usu, $cla) or die ("Error");
	mysql_select_db($bd, $co) or die ("No funciona");
	error_reporting(0);

$id = $_POST['idtproducto'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO tproducto (nombre_pro)VALUES('$nombre')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE tproducto SET nombre_pro = '$nombre' WHERE idtproducto = '$id'");
		
	break;
}

	if(isset($_POST['busca']))	#Llamó el dato del formulario para poder hacer la busqueda en el query
	$busca= $_POST['busca'];
	if($busca!=''){
	$query = "SELECT idtproducto, nombre_pro, existencia_pro, estatus_pro, categoria_tipo FROM tproducto natural join ttipo where nombre_pro, like '%".$busca."%'";
	$resultado = mysql_query($query);}
	else{
		$query="SELECT idtproducto, nombre_pro, existencia_pro, categoria_tipo FROM tproducto natural join ttipo where estatus_pro = 1 ";
		$resultado = mysql_query($query);

		$resultado = mysql_query($query);
	}
	echo "<table class='table table-hover' border='0' cellpadding='6' cellspacing='0' width='100' height='50'>
		<tr>
		
		<th style='width:0px;' >Nombre</th>
		<th style='width:0px;'>Kilos</th>
		<th style='width:0px;'>Gramos</th>
		<th style='width:0px;'>Categoria</th>
		<th style='width:1px;'>Editar</th>
		</tr>";
		while ($fila= mysql_fetch_array($resultado)){
		
			$cantidad= 1000;
			$existencia= $fila['existencia_pro']; 
			$resultadoo= ($existencia/$cantidad);
			echo "<tr>";
			 echo"<td>$fila[nombre_pro]</td>";
			 echo "<td>$resultadoo</td>";
			 echo "<td>$fila[existencia_pro]</td>";
			 echo "<td>$fila[categoria_tipo]</td>";
			//if($fila[existencia_pro]!=0) echo "<td>Disponible</td>"; if($fila[existencia_pro]==0) echo "<td>No disponible</td>";
			echo "<td><a href='javascript:editarProducto('.$fila[idtproducto].');'>Modificar</a> </td>";
			"</tr>";
	
	}
	echo '</table>';
	
}

}
?>

