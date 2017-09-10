<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <center><table border='0' cellpadding='10' cellspacing='0' width='600' height='60'>
		<tr>
		<td>id</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Nivel</td>
		<td>Estatus</td>
		<td>Editar</td>
		</tr>
<?php
class conexion2 {
	function todo(){
	$pc = "localhost";
	$usu = "root";
	$cla = "";
	$bd = "db_appae";
	
	$co= mysql_connect($pc, $usu, $cla) or die ("No funciona");
	mysql_select_db($bd, $co) or die ("No esta conectando con la base de dato");
	error_reporting(0);
	if(isset($_POST['busca']))
	$busca= $_POST['busca'];
	if($busca!=''){
	$query = "SELECT * FROM templeado where nombre_emp like '%".$busca."%' where estatus_emp = 1";
	$resultado = mysql_query($query);}
	else{
		$query="SELECT * FROM templeado where estatus_emp = 1";
		$resultado = mysql_query($query);
	
			
			}
			
		}
	}
			include_once("m_modificar2.php");
			$obj = new templeado();
			$buscar= $obj->consultar();
			while ($fila= $obj->arreglar($buscar)){
			

		


?>
			<tr>
			<td><?php echo $fila['idtempleado']; ?></td>
			 <td><?php echo $fila['nombre_emp']; ?></td>
			 <td><?php echo $fila['correo_emp']; ?></td>
			 <?php if($fila['cargo_emp']==1) echo "<td>Administrador</td>"; if($fila['cargo_emp']==2) echo "<td>Usuario</td>";?>
				<?php if($fila['estatus_emp']!=0) echo "<td>Activo</td>"; if($fila['estatus_emp']==0) echo "<td>Inactivo</td>";?>
			 <td><a href="modificar_alimento.php?id=<?php echo $fila['idtproducto'];?>">editar</a></td>
	
				</tr>
							<?php
			}



	?>

		
	</table></center>
	

	

</body>
</html>
