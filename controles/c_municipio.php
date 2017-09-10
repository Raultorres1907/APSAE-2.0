<?php
include_once("../modelos/m_municipio.php");
$obj_ho= new municipio();
$obj_ho->datos($_POST['municipio'],$_POST['estatus'],$_POST['estado']);
$obj_ho->registrar();
header("Location:../vistas/v_municipio.php");
?>