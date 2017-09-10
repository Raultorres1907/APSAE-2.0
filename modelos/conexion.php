<?php
class mBD
{
	private $pc, $usu, $cla, $bd, $co;

protected function conexion()
{
	$this->pc="localhost";
	$this->usu="root";
	$this->cla=""; #Acá coloca la clave de la base de datos
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
function inicio_trans()
{
	$this->ejecutar('START TRANSACTION');
}
function fin_trans()
{
	$this->ejecutar('COMMIT');
}
function error_trans()
{
	$this->ejecutar('ROLLBACK');
}
function incluye_trans( $sql ){
		$this->conectar();
		mysql_query($sql); // se ejecuta el query
		return mysql_insert_id();
	}

function elarreglo($rs)
{
	return mysql_fetch_array($rs);
}
function asi_va()
{
	if (mysql_affected_rows() > 0  or($result && mysql_num_rows($result)> 0 ));
	return true;
}
function nFilas( $registro )	{
		return mysql_num_rows( $registro );
	}
}
?>