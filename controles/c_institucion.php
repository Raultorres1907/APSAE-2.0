<?php
#Datos de la institucion que se registran al momento de llamar la funcion registra()
include_once("../modelos/m_institucion.php");
$obj_ho= new institucion();
$obj_ho->datos($_POST['institucion'],$_POST['estatus'],$_POST['municipio']);
$obj_ho->registrar();
header("Location:../vistas/v_institucion.php");
?>