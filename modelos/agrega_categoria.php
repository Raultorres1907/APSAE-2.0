<?php
include('conexion2.php');
$id = $_POST['idttipo'];
$proceso = $_POST['pro'];
$categoria = $_POST['categoria'];
$estado=$_POST['estado'];


//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO tproducto (nombre_pro)VALUES('$nombre')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE ttipo SET categoria_tipo = '$categoria', estatus = '$estado' WHERE idttipo = '$id'");
		
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM ttipo where estatus = 1 ORDER BY idttipo ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Estado</th>

				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>';
				echo '<td>'.$registro2['categoria_tipo'].'</td>';
				if($registro2['estatus']==1) echo '<td>Activo</td>';
				if($registro2['estatus']==0) echo '<td>Inactivo</td>';
				echo '<td><a href="javascript:editarProducto('.$registro2['idttipo'].')">Modificar</a> </td>
				</tr>';
	}
echo '</table>';
?>