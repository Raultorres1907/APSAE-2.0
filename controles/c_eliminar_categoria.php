<?php
include_once("../modelos/m_eliminar_categoria.php");
$ob = new categoria();
$ob->datos($_POST['id'],$_POST['categoria']);
$ob->eliminar();

?>