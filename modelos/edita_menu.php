<?php
include('conexion2.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT nombre_me, estatus_me, nombre_pro FROM tmenu natural join tmenudetalle  natural join tproducto WHERE idtmenu = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['nombre_me'], 
				1 => $valores2['nombre_pro'],
				2 => $valores2['estatus_me'],



				);
echo json_encode($datos);
?>