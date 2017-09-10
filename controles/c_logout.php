<?php
#Para cerrar la cuenta del usuario
session_start();
	if(isset($SESSION['usuario'])){
		unset($SESSION['nivel']);
		unset($SESSION['usuario']);
		header("Location:../index.php");

	}
	else
	{
		header("Location:../index.php");
	}

?>