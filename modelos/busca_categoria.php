<?php
include('conexion2.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM ttipo WHERE categoria_tipo LIKE '%$dato%' ORDER BY idttipo ASC");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                   <th width="300">Categoria</th>
                    <th width="200">Estado</th>
                    <th width="200">Opciones</th>

            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){

		echo '<tr>';
				echo '<td>'.$registro2['categoria_tipo'].'</td>';
				if($registro2['estatus']==1) echo '<td>Activo</td>';
				if($registro2['estatus']==0) echo '<td>Inactivo</td>';
			echo 	'<td><a href="javascript:editarProducto('.$registro2['idttipo'].')" ">Modificar</a> </td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>