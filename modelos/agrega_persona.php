<?php
include('conexion2.php');
$id = $_POST['idtempleado'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$cargo = $_POST['cargo'];
$estado=$_POST['estado'];


//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO tproducto (nombre_pro)VALUES('$nombre')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE templeado SET idtempleado = '$id', nombre_emp = '$nombre', apellido_emp='$apellido', estatus_emp = '$estado', correo_emp = '$correo', cargo_emp = '$cargo' WHERE idtempleado = '$id'");
		
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM templeado natural join tinstitucion  where estatus_emp = 1 ORDER BY idtempleado ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
        		<th width="300">Cédula</th>
            	<th width="300">Nombre</th>
            	<th width="300">Apellido</th>
            	<th width="300">Correo</th>
            	<th width="300">Cargo</th>
            	<th width="300">Institución</th>
                <th width="200">Estado</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>';
				echo '<td>'.$registro2['idtempleado'].'</td>';
				echo '<td>'.$registro2['nombre_emp'].'</td>';
				echo '<td>'.$registro2['apellido_emp'].'</td>';
				echo '<td>'.$registro2['correo_emp'].'</td>';
				if ($registro2['cargo_emp']==1)echo '<td>Administrador</td>';
				if ($registro2['cargo_emp']==2)echo '<td>Usuario</td>';
				echo '<td>'.$registro2['nombre_inst'].'</td>';
				if($registro2['estatus_emp']==1) echo '<td>Activo</td>';
				if($registro2['estatus_emp']==0) echo '<td>Inactivo</td>';
				echo '<td><a href="javascript:editarProducto('.$registro2['idtempleado'].');">Modificar</a> </td>
				</tr>';
	}
echo '</table>';
?>