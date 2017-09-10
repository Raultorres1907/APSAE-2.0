<?php
include_once("conexion.php");
class tpersonal extends mBD
{
	private $cedula, $usuario, $nombre, $apellido,$institucion, $status, $clave, $pregunta, $respuesta, $nivel,$correo;
	function __construct()
	{
		$this->cedula=0;
		$this->usuario=0;
		$this->nombre="";
		$this->apellido="";
		$this->institucion="";
		$this->status=0;
		$this->clave="";
		$this->pregunta="";
		$this->respuesta="";
		$this->nivel=0;
		$this->correo="";
		$this->conexion();
		
	}
	function SetDatos($ci,$u,$n, $a, $s, $c, $p, $r, $ni, $co, $ins)
	{
		$this->cedula=htmlentities(trim($ci));
		$this->usuario=htmlentities(trim($u));
		$this->nombre=htmlentities(trim($n));
		$this->apellido=htmlentities(trim($a));
		$this->status=htmlentities(trim($s));
		$this->clave=htmlentities(trim($c));
		$this->pregunta=htmlentities(trim($p));
		$this->respuesta=htmlentities(trim($r));
		$this->nivel=htmlentities(trim($ni));
		$this->correo=htmlentities(trim($co));
		$this->institucion=htmlentities(trim($ins));
	}
	function SetAdd($u)
	{
		$this->usuario=htmlentities(trim($u));
	}
	function registrar()
	{error_reporting(0);
		$sql1="SELECT  idtempleado FROM templeado where idtempleado='$this->cedula'";
			$resultado= $this->ejecutar($sql1);
			$fila = mysql_num_rows($resultado);
				if($fila==0)
				{
					
		
		$sql2 = "INSERT INTO templeado (idtempleado, nombre_emp, apellido_emp, estatus_emp, correo_emp, cargo_emp, idtinstitucion) values ('$this->cedula','$this->nombre','$this->apellido','$this->status','$this->correo','$this->nivel', '$this->institucion')";
			$resultado2= $this->ejecutar($sql2);
			 $this->ejecutar($sql2);
			if($fila2==0)
				{
		
			$clave= md5($this->clave);
			$sql = "INSERT INTO tusuario(login_usu,clave_usu,pregunta_usu,respuesta_usu, idtempleado) values('$this->usuario','$clave','$this->pregunta','$this->respuesta', '$this->cedula')";
				$this->ejecutar($sql);
		
}
	echo "<script>
			alert('Registro con exito');
			location.href='../vistas/principal.php';</script>";
}
else{
	echo "<script>
			alert('Error al registrar');
			location.href='../vistas/registrar_cuenta.php';</script>";
}
}
}



?>