<?php
include_once("../modelos/conexion.php");
class institucion extends mBD
{
	private $institucion, $municipio, $estatus;
	function __construct()
	{
		$this->institucion="";
		$this->municipio="";
		$this->estatus=0;
		$this->conexion();
	}
	function datos($institucion, $estatus,$municipio)
	{
		$this->institucion=htmlentities(trim($institucion));
		$this->estatus=htmlentities(trim($estatus));
		$this->municipio=htmlentities(trim($municipio));
	}
	function registrar()
	{
		$sql="INSERT INTO tinstitucion (nombre_inst, estatus_ins, idtmunicipio) values('$this->institucion','$this->estatus','$this->municipio')";
		$this->ejecutar($sql);
		echo $sql;
	}
}
?>