<?php
include_once("conexion.php");
class tpersonal extends mBD
{
	private $idper, $claveper;

	function __construct()
	{
		$this->idper="";
		$this->claveper=0;
		$this->conexion();
	}
	function datos($i, $c)
	{
		$this->idper=$i;
		$this->claveper=$c;
	}
	function setdacc($i)
	{
		$this->idper=$i;
	}
	function consultar()
	{
		$sql="select *from tusuario where login_usu = '$this->idper'";
		return $this->ejecutar($sql);
	}
	function arreglo($rs)
	{
		return $this->elarreglo($rs);
	}
	function busca_persona( $ced ) // busca los datos de una persona
	{	
		$sql = "select * from templeado where idtempleado = '$ced'";
		$tupla =  $this->ejecutar($sql);
		if ($tupla)
			return $this->arreglo( $tupla );
		return false;
	}
}
?>