<?php
include('conexion2.php');
$id = $_POST['idtproducto'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$estado=$_POST['estado'];


//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO tproducto (nombre_pro)VALUES('$nombre')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE tproducto SET nombre_pro = '$nombre', estatus_pro = '$estado' WHERE idtproducto = '$id'");
		
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM tproducto natural join ttipo where estatus_pro = 1 ORDER BY idtproducto ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">G/CC</th>
                <th width="150">Kilos</th>
                <th width="150">categoria</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
			$cantidad= 1000;
			$existencia= $registro2['existencia_pro']; 
			$resultadoo= ($existencia/$cantidad);
		echo '<tr>
				<td>'.$registro2['nombre_pro'].'</td>
				<td>'.$registro2['existencia_pro'].'</td>
				<td> '.$resultadoo.'</td>
				<td> '.$registro2['categoria_tipo'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['idtproducto'].')">Modificar</a> </td>
				</tr>';
	}
echo '</table>';
?>