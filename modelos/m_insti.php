<?php
include_once("conexion.php");
class institucion extends mBD{
	function __construct(){
		$this->conexion();
	}
	function consultaTodos(){
		$sql="SELECT * FROM tmunicipio ORDER BY nombre_mun asc";
		return $this->ejecutar( $sql );
	}
	function arreglo( $rs ){
		return $this->elarreglo( $rs );
	}
}
?>