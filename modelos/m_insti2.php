<?php
include_once("conexion.php");
class institucion2 extends mBD{
	function __construct(){
		$this->conexion();
	}
	function consultaTodos(){
		$sql="SELECT * FROM tinstitucion ORDER BY nombre_inst asc";
		return $this->ejecutar( $sql );
	}
	function arreglo( $rs ){
		return $this->elarreglo( $rs );
	}
}
?>