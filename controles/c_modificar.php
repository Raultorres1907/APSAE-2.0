<?php
include_once("../modelos/m_query_consulta.php");
$id=$_REQUEST['id'];
$nombre=$_POST['nombre'];
$categoria=$_POST['categoria'];

	$sql= "UPDATE tproducto SET nombre_pro='$nombre' where nombre_pro = '$nombre'";
	mysql_query($sql);

	header("Location:../vistas/modificar_alimento.php"); 
?>