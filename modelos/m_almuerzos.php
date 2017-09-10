<?php
include_once("conexion.php");
class almuerzos extends mBD
{
	private $numero;
	function __construct()
	{
		$this->numero=0;
		$this->conexion();
	}
	function datos($numero)
	{
		$this->numero=$numero;
	}
	function busca()
	{
		$sql="SELECT proporcion_menu, idtmenu, nombre_pro FROM tmenudetalle natural join tproducto where idtmenu = '$this->numero'";
		return $this->ejecutar($sql);
		 
	}
	function arreglo($rs)
	{
		return $this->elarreglo($rs);
	}
}
?>