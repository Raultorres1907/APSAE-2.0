<?php
include_once ('m_bd.php');
class MOD_Recuperar extends bd
{
	
	function Buscar($Usuario)
	#Consulta para ver si la pregunta si concuerda con la respuesta
	{
		$this->Usuario = $Usuario;
		$Consulta = $this->conexion->query("SELECT login_usu, pregunta_usu FROM tusuario WHERE login_usu='".$this->Usuario."'");
		if(mysqli_num_rows($Consulta)>0)
		{
			$Busqueda = mysqli_fetch_array($Consulta);
			$Pregunta = $Busqueda["pregunta_usu"];
			$Array = array('Pregunta' =>$Pregunta);
			$JSON = json_encode($Array);
			echo $JSON;
		}
		else
		{
			echo "Usuario invalido";
		}
	}

	function Validar($Usuario,$Respuesta)
	{
		$this->Usuario = $Usuario;
		$this->Respuesta = $Respuesta;
		$Consulta = $this->conexion->query("SELECT login_usu, respuesta_usu FROM tusuario WHERE login_usu='".$this->Usuario."' AND respuesta_usu='".$this->Respuesta."'");
		if (mysqli_num_rows($Consulta)>0)
		{
			echo "Correcto";
		}
		else
		{
			echo "Respuesta Incorrecta";
		}
	}
	function CambiarContra($Usuario,$Pass)
	#Si es igual, Cambiar la contraseña
	{
		$this->Password = md5($Pass);
		$this->Usuario = $Usuario;
		$this->Usuario = $Usuario;
		$this->conexion->query("UPDATE tusuario SET clave_usu='".$this->Password."' WHERE login_usu='".$this->Usuario."'");
		echo "Exito";
	}
}
?>