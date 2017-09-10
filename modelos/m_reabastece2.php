<?php
include_once("conexion.php");
class nuevo extends mBD
{
	private $idtproducto, $existencia_pro;

	function __construct()
	{
		$this->idtproducto="";
		$this->existencia_pro="";
		$this->conexion();
	}
	function datos($id, $ex)
	{
		$this->idtproducto=$id;
		$this->existencia_pro=$ex;
	}
function actualizar()
	
#Inicio de la transaccion
{
	$transaccion = false;
		$this->num = null;
		$this->inicio_trans();
		#Se modifican los datos
		$sql="UPDATE tproducto SET existencia_pro=existencia_pro+'$this->existencia_pro' WHERE idtproducto='$this->idtproducto'";
			$resultado= $this->ejecutar($sql);
			$fila = mysql_num_rows($resultado);
				if($fila==0)
			{
				error_reporting(0);
			echo "<script>
			alert('Exito al reabastecer');
			location.href='../vistas/v_reabastecer.php';</script>";
			#Se insertan
			$concepto=$_POST['concepto'];
			$sql="INSERT INTO tmovimiento(tipo_mov, fecha_mov, idtempleado, concepto_mov) values ('Entrada', current_date , '$ide', '$concepto')";
		$rs = $this->ejecutar($sql);
				echo ($sql);
		
		if ( $this->asi_va() ) 
		{
			$sql="SELECT idtempleado from templeado ORDER BY idtempleado desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$ide=$busc['idtempleado'];
		

		echo ($sql);
			
			if ( $this->asi_va() ) 
			{	$sql="SELECT idtmovimiento from tmovimiento ORDER BY idtmovimiento desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$id2=$busc['idtmovimiento'];

		
		if ( $this->asi_va() ) 
		{
			$sql="INSERT INTO t_mov_detalle(idtmovimiento, idtproducto, gramaje_total) values ('$id2', '$this->idtproducto', '')";
		$rs = $this->ejecutar($sql);
		echo ($sql);
				if ( $this->asi_va() ) {
					$transaccion = true;
				}
				}
			}
		}
		}
		else
		{
			echo "<script>
			alert('Error al reabastecer');
			location.href='../vistas/v_reabastecer.php';</script>";
		}
	
		
			if ( $transaccion ) 	// se ejecuto la transaccion?
			$this->fin_trans(); 
			// Grabar
		else
			$this->deshacer_trans();	// Deshacer todo
		
	}

}
?>