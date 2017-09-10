<?php

class conexion {
	function todo(){
	$pc = "localhost";
	$usu = "root";
	$cla = ""; #Acá colocas la clave del yamecaigo
	$bd = "db_appae";
	
	$co= mysql_connect($pc, $usu, $cla) or die ("Error"); #
	mysql_select_db($bd, $co) or die ("No funciono"); 
	error_reporting(0);
	if(isset($_POST['busca']))
	$busca= $_POST['busca']; #llamó el dato para hacer la busqueda en el query
	if($busca!=''){
	$query = "SELECT idtproducto, nombre_pro, existencia_pro, estatus_pro, categoria_tipo FROM tproducto inner join ttipo where nombre_pro like '%".$busca."%'"; #acá no me acuerdo pero se que busca al burda tenso
	$resultado = mysql_query($query);}
	else{
		$query="SELECT idtproducto, nombre_pro, categoria_tipo, existencia_pro FROM tproducto natural join ttipo where estatus_pro=0 ";
		$resultado = mysql_query($query);
	}
	#Tabla que se muestra en la vista consulta_usuario
	echo "<center><table class='table table-hover table-bordered table-striped'  cellpadding='10' cellspacing='0' width='600' height='200'>
		<tr>
		<th>Nombre</th>
		<td>Kilos</td>
		<td>Gramos</td>
		<td>Categoria</td>
		<td>Estatus</td>
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
			if($fila[existencia_pro]!=0) echo "<td>Disponible</td>"; if($fila[existencia_pro]==0) echo "<td>No disponible</td>";
			"</tr>";
	
	}
	echo '</table></center>';
	
}

}
?>

