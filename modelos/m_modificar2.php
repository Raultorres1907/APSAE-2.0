<?php
include_once("conexion.php");
class templeado extends mBD
{
	function __construct()
	{	
	
		$this->conexion();
	}


	function consultar()
	{
		
		$sql= "SELECT * FROM templeado";
		return $this->ejecutar($sql);
	}


	/*function modificar()
	{
		$sql= "UPDATE tingrediente SET nombre_ing='$this->nombre', existencia_ing='$this->cantidad',categoria_ing='$this->categoria' where idingrediente = '$this->id'";
		 $this->ejecutar($sql);
	}
	*/function arreglar($rs)
	{
		return $this->elarreglo($rs);
	}
	}
?>