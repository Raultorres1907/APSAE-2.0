<?php 
include_once("conexion.php");
class crear extends mBD
{
	private $idtproducto, $cantidad, $proporcion;
	function __construct()
	{
		$this->idtproducto="";
		$this->cantidad=0;
		$this->proporcion=0;
		$this->conexion();
	}
	function setDatos($id, $ca, $pro)
	{
		$this->idtproducto=$id;
		$this->cantidad=$ca;
		$this->proporcion=$pro;
	}
	function preparar()
	{
	$transaccion = false;
		$this->num = null;
		$this->inicio_trans();
			
		
		$sql="UPDATE tproducto SET existencia_pro=existencia_pro-'$this->proporcion' WHERE idtproducto='$this->idtproducto'";
			$resultado= $this->ejecutar($sql);
			$fila = mysql_num_rows($resultado);
				if($fila==0)
			{
				error_reporting(0);
			echo "<script>
			alert('Exito al preparar menu!');
			location.href='../vistas/v_almuerzos.php';</script>";

			$sql="SELECT *from templeado where cargo_emp=1 ORDER BY idtempleado desc ";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$ide=$busc['idtempleado'];
			
		
		if ( $this->asi_va() ) // se modifica usuario
		{
			$sql="INSERT INTO tmovimiento(tipo_mov, fecha_mov, idtempleado, concepto_mov, cantpersona_mov) values ('Salida', current_date , '$ide', 'Almuerzo', '$this->cantidad')";
				$rs = $this->ejecutar($sql);
				echo ($sql);
			
			if ( $this->asi_va() ) // se modifica libro
			{	$sql="SELECT idtmovimiento from tmovimiento ORDER BY idtmovimiento asc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$id2=$busc['idtmovimiento'];

		
		if ( $this->asi_va() ) // se modifica usuario
		{
			$sql="INSERT INTO t_mov_detalle(idtmovimiento, idtproducto, gramaje_total) values ('$id2', '$this->idtproducto', '$this->proporcion')";
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
			alert('Error al preparar menu!');
			location.href='../vistas/v_almuerzos.php';</script>";
		}
	
		
			if ( $transaccion ) 	// se ejecuto la transaccion?
			$this->fin_trans(); 
			// Grabar
		else
			$this->deshacer_trans();	// Deshacer todo
		
	}

}

?>