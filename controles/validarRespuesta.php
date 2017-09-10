<?php
#Controlador para validar la respuesta que el usuario coloca al momento del "recuperar contraseña"
include_once ('../modelos/recuperar.php');
$Usuario = $_POST["Usu"];
$Respuesta = $_POST["Respuesta"];
$ValidarRes = new MOD_Recuperar;
$ValidarRes->Validar($Usuario,$Respuesta);
?>