<?php
class conexion
{
	private $pc, $usu, $cla, $bd, $co;

protected function conexion()
{
	$this->pc="localhost";
	$this->usu="root";
	$this->cla="";
	$this->bd="db_appae";
}
protected function conectar()
{
	$this->co= mysql_connect($this->pc,$this->usu, $this->cla);
	if($this->co&&mysql_select_db($this->bd,$this->co))
		return true;
	else
		die ("No se conecto". mysql_error());

}
 function ejecutar($sql)
{
	$this->conectar();
	return mysql_query($sql);
}

function elarreglo($rs)
{
	return mysql_fetch_array($rs);
}

}
?>