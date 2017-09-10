<?php
include('conexion2.php');
$id = $_POST['idtmenu'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$estado=$_POST['estado'];


//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO tproducto (nombre_pro)VALUES('$nombre')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE tmenu SET nombre_me = '$nombre', estatus_me  = '$estado' WHERE idtmenu = '$id'");
		
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM tmenu natural join tmenudetalle natural join tproducto ORDER BY idtmenu ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
        		<th width="100">Numero</th>
            	<th width="300">Nombre</th>
                <th width="200">Ingredientes</th>
                <th width="200">Estado</th>
                

				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>';
				echo '<td>'.$registro2['idtmenu'].'</td>';
				echo '<td>'.$registro2['nombre_me'].'</td>';
				echo '<td>'.$registro2['nombre_pro'].'</td>';
				if($registro2['estatus_me']==1) echo '<td>Activo</td>';
				if($registro2['estatus_me']==0) echo '<td>Inactivo</td>';
				echo '<td><a href="javascript:editarProducto('.$registro2['idtmenu'].')">Modificar</a> </td>
				</tr>';
	}
echo '</table>';
?>