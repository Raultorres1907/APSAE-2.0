<?php
#Regitro de categoria por medio de su función llamada desde el modelo registrar()
include_once("../modelos/m_categoria2.php");
$obj_ho = new cate();
$obj_ho->datos($_POST['categoria'], $_POST['estatus']);
$obj_ho->registrar();
	

?>