<?php
include_once("../modelos/m_usuarios.php");#datos del usuario, para que sean registrados al momento de llamar la funcion "registrar()"
$obj= new tpersonal();error_reporting(0);
$obj->SetDatos($_POST['cedula'],$_POST['usuario'],$_POST['nombre'],$_POST['apellido'],$_POST['status'],$_POST['clave'],$_POST['pregunta'],$_POST['respuesta'],$_POST['nivel'],$_POST['correo'], $_POST['institucion']);
$obj->registrar();


?>