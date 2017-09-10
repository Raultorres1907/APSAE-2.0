<?php
class bd
{
	public $conexion;
	private $local = "localhost";
	private $Usu = "root";
	private $Pass = "";// aqui colocas la contraseña de la base de datos
	private $BD = "db_appae";
	
	function __construct()
	{
		$this->conexion = new mysqli($this->local,$this->Usu,$this->Pass,$this->BD);
	}
}
?>