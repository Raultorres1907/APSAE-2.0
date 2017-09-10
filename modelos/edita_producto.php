<?php
include('conexion2.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM tproducto WHERE idtproducto = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nombre_pro'], 
				1 => $valores2['estatus_pro'],



				);
echo json_encode($datos);
?>