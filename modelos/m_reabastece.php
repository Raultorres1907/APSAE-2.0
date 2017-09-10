<?php
include_once("conexion.php");
class ingrediente extends mBD{
	function __construct(){
		$this->conexion();
	}
	#Consulta los datos de tproducto y que esten activos
	function consultaTodos(){
		$sql="SELECT * FROM tproducto where estatus_pro = 1  ORDER BY nombre_pro asc";
		return $this->ejecutar( $sql );
	}
	function getTuplas( $rs ){
		return $this->elarreglo( $rs );
	}
}
?>