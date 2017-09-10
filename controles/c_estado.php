<?php 
include_once("../modelos/m_estado.php");
$obj_ho= new estado();
$obj_ho->datos($_POST['estado'],$_POST['estatus']);
$obj_ho->registrar();
header("Location:../vistas/v_estado.php");
?>