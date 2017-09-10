<?php
include('conexion2.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT idtproducto, nombre_pro, existencia_pro, estatus_pro, categoria_tipo FROM tproducto natural join ttipo WHERE nombre_pro LIKE '%$dato%' ORDER BY idtproducto ASC");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                   <th width="100">Nombre</th>
                    <th width="100">G/CC</th>
			        <th width="100">Kilos</th>
			        <th width="100">Categoria</th>
			        <th width="100">Estado</th>
			        <th width="10">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
			$cantidad= 1000;
			$existencia= $registro2['existencia_pro']; 
			$resultadoo= ($existencia/$cantidad);
		echo '<tr>';
				echo '<td>'.$registro2['nombre_pro'].'</td>';
				echo '<td>'.$registro2['existencia_pro'].'</td>';
				echo '<td> '.$resultadoo.'</td>';
				echo '<td> '.$registro2['categoria_tipo'].'</td>';
				if($registro2['estatus_pro']==1) echo '<td>Activo</td>';
				if($registro2['estatus_pro']==0) echo '<td>Inactivo</td>';
				echo '<td><a href="javascript:editarProducto('.$registro2['idtproducto'].')" ">Modificar</a> </td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>