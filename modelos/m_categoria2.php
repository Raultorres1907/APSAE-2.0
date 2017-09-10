<?php
include_once("conexion.php");
class cate extends mBD
{
	private $categoria, $estatus;
	function __construct()
	{
		$this->categoria="";
		$this->estatus=0;
		$this->conexion();
	}
	function datos($categoria, $estatus)
	{
		$this->categoria=$categoria;
		$this->estatus=$estatus;
	}
	function registrar()
	{
		$sql1="SELECT  categoria_tipo FROM ttipo where categoria_tipo='$this->categoria'";
		$resultado= $this->ejecutar($sql1);
		$fila = mysql_num_rows($resultado);
		
		
		if($fila==0){
		$sql="INSERT into ttipo (categoria_tipo, estatus) values ('$this->categoria', '$this->estatus')";
		$insert= $this->ejecutar($sql);
		echo "<script>
			alert('Registro con exito');
			location.href='../vistas/registro_alimento.php';</script>";
	}
	else{
		echo "<script>
			alert('Ya esta registrado');
			location.href='../vistas/registrar_tipo.php';</script>";
	}
		
	}
	function arreglo($rs)
	{
		return $this->elarreglo($rs);
	}
}
?>