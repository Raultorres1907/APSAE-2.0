<?php

class conexion2 {
	function todo(){
	$pc = "localhost";
	$usu = "root";
	$cla = "";
	$bd = "db_appae";
	
	$co= mysql_connect($pc, $usu, $cla) or die ("aja");
	mysql_select_db($bd, $co) or die ("no furula");
	error_reporting(0);
	if(isset($_POST['busca']))
	$busca= $_POST['busca'];
	if($busca!=''){
	$query = "SELECT * FROM templeado where nombre_emp like '%".$busca."%'";
	$resultado = mysql_query($query);}
	else{
		$query="SELECT * FROM templeado";
		$resultado = mysql_query($query);
	}
	echo "<center><table  class='table table-hover table-bordered table-striped'  cellpadding='10' cellspacing='0'>
		<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Correo</td>
		<td>Nivel</td>
		<td>Estado</td>
		
		
		</tr>";
		while ($fila= mysql_fetch_array($resultado)){
		
			
			echo "<tr>";
			 echo"<td>$fila[nombre_emp]</td>";
			 echo "<td>$fila[apellido_emp]</td>";
			 echo "<td>$fila[correo_emp]</td>";
			  if($fila['cargo_emp']==1) echo "<td>Administrador</td>"; if($fila['cargo_emp']==2) echo "<td>Usuario</td>";
			 
			 if($fila[estatus_emp]!=0) echo "<td>Activo</td>"; if($fila[estatus_emp]==0) echo "<td>Inactivo</td>";

			
	
	}
	echo '</table></center>';
	
}

}
?>