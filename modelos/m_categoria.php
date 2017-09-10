<?php
include_once("conexion.php");
class categoria extends mBD{
	function __construct(){
		$this->conexion();
	}
	function consultaTodos(){
		$sql="SELECT * FROM ttipo where estatus = 1 ORDER BY categoria_tipo asc";
		return $this->ejecutar( $sql );
	}
	function getTuplas( $rs ){
		return $this->elarreglo( $rs );
	}
}
?>