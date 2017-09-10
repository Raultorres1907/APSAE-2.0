<?php
#Llama la funcion mod_recuperar para el cambiar contraseña
include_once ('../modelos/recuperar.php');
$Usuario = $_POST["Usu"];
$Pass = $_POST["pass"];
$Cambiar = new MOD_Recuperar;
$Cambiar->CambiarContra($Usuario,$Pass);

?>