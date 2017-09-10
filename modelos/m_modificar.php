<?php
include_once("conexion.php");
class tingrediente extends mBD
{
	private $id,$nombre, $categoria,$sta;
	function __construct()
	{	
		$this->id="";
		$this->nombre="";
		$this->categoria="";
		$this->conexion();
	}
	function setDatos($i,$nom,$ca)
	{	
		$this->id=htmlentities(trim($i));
		$this->nombre=htmlentities(trim($nom));
		$this->categoria=htmlentities(trim($ca));
		
	}
	function datos($i)
	{
		$this->id=htmlentities(trim($i));
	}
	#function consultar()
	#{

	
	#	$sql= "SELECT * FROM tproducto where idtproducto = '$id'";
	#	return $this->ejecutar($sql);
	#}
	function consultar2()
	{
		
		$sql= "SELECT idtproducto, nombre_pro, existencia_pro, estatus_pro, categoria_tipo from tproducto natural join ttipo";
		return $this->ejecutar($sql);
	}
	#function buscar()


	function modificar()
	{
		
		$sql= "UPDATE tproducto SET nombre_pro='$this->nombre',categoria_pro='$this->categoria' where idtproducto = '$id'";
		 $this->ejecutar($sql);
	}
	function arreglar($rs)
	{
		return $this->elarreglo($rs);
	}
	}
?>