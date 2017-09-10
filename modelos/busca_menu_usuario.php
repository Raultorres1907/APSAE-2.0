<?php
include('conexion2.php');
error_reporting(0);
if(isset($_POST['dato']))
$dato = $_POST['dato'];
if($dato!=''){
//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM tmenu natural join tmenudetalle natural join tproducto WHERE idtmenu LIKE '%$dato%' ORDER BY idtmenu ASC");}

else {
	$registro = mysql_query("SELECT * FROM tmenu WHERE  estatus_me = 1 ORDER BY idtmenu ASC");
}
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
        			<th width="100">Numero</th>
                   <th width="300">Nombre</th>
                   <th width="200">Ingredientes</th>
                    <th width="200">Estado</th>
                    

            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){

		echo '<tr>';
				echo '<td>'.$registro2['idtmenu'].'</td>';
				echo '<td>'.$registro2['nombre_me'].'</td>';
				echo '<td>'.$registro2['nombre_pro'].'</td>';
				if($registro2['estatus_me']==1) echo '<td>Activo</td>';
				if($registro2['estatus_me']==0) echo '<td>Inactivo</td>';
			
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>