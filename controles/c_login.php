<?php
#Controlador de login compara si la contraseña es igual estando encriptada, si lo es pues avanza al siguiente paso
session_start();
include_once("../modelos/m_personal.php");
$ausuario= new tpersonal();
$ausuario->setdacc($_POST['idper']);
	$tupla= $ausuario->consultar();
	if($tupla)
	{
		$rs=$ausuario->arreglo($tupla);
		if(md5($_POST['claveper'])==$rs['clave_usu']){
			$ced= $rs['idtempleado'];
			$rs_per= $ausuario->busca_persona($ced);
			$niv=$rs_per['cargo_emp'];
			$_SESSION['persona']=$rs_per['nombre_emp'];
			$_SESSION['apellido']=$rs_per['apellido_emp'];
			$_SESSION['cedula']=$rs_per['idtempleado'];
			$_SESSION['usuario']=$niv;
			$_SESSION['HoraEntrada']=date("Y-n-j H:i:s");
			switch ($niv) {
				case 1:
					echo '<script>alert("¡Bienvenido Administrador!")
					location.href="../vistas/principal.php";</script>';
					
					break;
				
				case 2:
				echo '<script>alert("¡Bienvenido Usuario!")
					location.href="../vistas/principal_usuario.php";</script>';
			}

		}
		else 
			header("Location:../inicio.php?error_clave=1");
	}
?>