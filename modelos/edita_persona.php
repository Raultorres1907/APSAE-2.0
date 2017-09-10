<?php
include('conexion2.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM templeado WHERE idtempleado = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nombre_emp'], 
				1 => $valores2['apellido_emp'],
				2 => $valores2['estatus_emp'],
				3 => $valores2['correo_emp'],
				4 => $valores2['cargo_emp'],



				);
echo json_encode($datos);
?>