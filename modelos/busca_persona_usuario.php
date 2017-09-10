<?php
include('conexion2.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM templeado natural join tinstitucion WHERE cargo_emp LIKE '%$dato%' ORDER BY idtempleado ASC");


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
				

            </tr>';
if(mysql_num_rows($registro)>0){
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
				echo '
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>