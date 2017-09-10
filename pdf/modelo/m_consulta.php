<?php
include_once("conexion.php");
class reporte extends conexion
{
	function __construct()
	{
		$this->conexion();
	}
	function consultar()
	{
		$sql="SELECT nombre_pro, existencia_pro, categoria_tipo FROM tproducto natural join ttipo";
		return $this->ejecutar($sql);
	}
	function consultarper()
	{
		$sql="SELECT * FROM templeado";
		return $this->ejecutar($sql);
	}

	function arreglo($rs)
	{
		return $this->elarreglo($rs);
	}
}
?>