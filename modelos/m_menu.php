<?php
include_once("conexion.php");
class menu extends mBD
{
	private $idmenu, $nombre, $existencia_pro ,$estado, $idtproducto;
	function __construct()
	{
		$this->idmenu="";
		$this->nombre="";
		$this->existencia_pro=0;
		$this->estado=0;

		$this->idtproducto="";
		$this->conexion();
	}
	function setDatos($me, $no, $est)
	{
		$this->idmenu=htmlentities(trim($me));
		$this->nombre=htmlentities(trim($no));
		$this->estado=htmlentities(trim($est));
		


		}
		function datos($id, $ext)
		{
		$this->idtproducto=htmlentities(trim($id));
		$this->existencia_pro=htmlentities(trim($ext));
		
		}
	function cargarmenu1()
		#Hace una consulta si el id del menu no existe lo inserta junto con sus ingredientes
{
		$sql1="SELECT  idtmenu FROM tmenu where idtmenu='$this->idmenu'";
			$resultado= $this->ejecutar($sql1);
			$fila = mysql_num_rows($resultado);
				if($fila==0)
			{
		error_reporting(0);
		$sql="INSERT INTO tmenu(idtmenu, nombre_me, estatus_me) values ('$this->idmenu','$this->nombre', '$this->estado')";
		 $this->ejecutar($sql);
		
			
		echo "<script>
			alert('Menu registrado con exito!');
			location.href='../vistas/v_registrar_menu.php';</script>";
		}
		else{
				echo "<script>
			alert('Este menu ya esta registrado');
			location.href='../vistas/v_registrar_menu.php';</script>";

		}
	}
		
			
	function cargarmenu2()
	{
		error_reporting(0);
		$sql2="INSERT INTO tmenudetalle(idtproducto, proporcion_menu, idtmenu ) values('$this->idtproducto','$this->existencia_pro', '$this->idmenu')";
			$resultado2= $this->ejecutar($sql2);
			$fila2 = mysql_num_rows($resultado2);
				if($fila2==0)
				{
					
				
					echo "<script>
				alert('Los datos del menu fueron registrados!');
				location.href='../vistas/v_registrar_menu.php';</script>";
				}
				else
				{
					echo "<script>
					alert('Error al momento de registrar datos del menu');
					location.href='../vistas/v_registrar_menu.php';</script>";
				}
	}
	function arreglo($rs)
	{
		return $this->elarreglo($rs);
	}
}

?>