<?php
include_once("conexion.php");
class conexion extends mBD {

	function __construct()
	{
		$this->conexion();
	}
	function buscar()
	{
error_reporting(0);
	if(isset($_POST['busca']))
	$busca= $_POST['busca'];
	if($busca!=''){
	$sql = "SELECT idtmenu, nombre_me, nombre_pro, proporcion_menu from tmenu natural join tmenudetalle natural join tproducto   where idtmenu like '%".$busca."%'";
	$resultado = $this->ejecutar($sql);}
	else{
		$sql="SELECT idtmenu, nombre_me from tmenu where estatus_me = 1 ";
		$resultado = $this->ejecutar($sql);

	
	}
	echo "<table class='table table-hover' border='0' cellpadding='6' cellspacing='0' width='100' height='50'>
		<tr>
		
		<th style='width:0px;' >Numero</th>
		<th style='width:0px;'>Nombre</th>
		<th style='width:0px;'>Ingredientes</th>
		<th style='width:0px;'>G/CC</th>
		<th style='width:1px;'>Editar</th>
		</tr>";
		while ($fila= mysql_fetch_array($resultado)){
		
		
			echo "<tr>";
			 echo"<td>$fila[idtmenu]</td>";
			 echo "<td>$fila[nombre_me]</td>";
			 echo "<td>$fila[nombre_pro]</td>";
			 echo "<td>$fila[proporcion_menu]</td>";
			//if($fila[existencia_pro]!=0) echo "<td>Disponible</td>"; if($fila[existencia_pro]==0) echo "<td>No disponible</td>";
			 ?><td> <a href="../vistas/modificar_alimento.php?id=<?php echo  $fila[idtproducto]; ?>">Editar<a/></td><?php
			"</tr>";
	
	}
	echo '</table>';


	
}
}

?>

