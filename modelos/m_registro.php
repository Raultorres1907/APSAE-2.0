<?php
date_default_timezone_set('America/Caracas');
include_once("conexion.php");
class ingredientes extends mBD
{
	private $nombre,$cantidad, $estato, $idttipo, $concepto;
	function __construct()
	{
		$this->nombre="";
		$this->cantidad=0;
		$this->estatus=0;
		$this->idttipo=0;
		$this->concepto="";
		$this->conexion();
	}
	function setDatos($nom, $can,$sta, $cat, $co)
	{
		
		$this->nombre=htmlentities(trim($nom));
		$this->cantidad=htmlentities(trim($can));
		$this->estatus=htmlentities(trim($sta));
		$this->idttipo=htmlentities(trim($cat));
	}

	

	

	function registrargramos()
	#Inicia la transaccion
{error_reporting(0);
	$transaccion = false;
		$this->num = null;
		$this->inicio_trans();
		$sql1="SELECT  nombre_pro FROM tproducto where nombre_pro='$this->nombre'";
			$resultado= $this->ejecutar($sql1);
			$fila = mysql_num_rows($resultado);
				if($fila==0)
			{
			
		$sql="insert into tproducto(nombre_pro, existencia_pro, estatus_pro, idttipo) values ('$this->nombre','$this->cantidad','$this->estatus', '$this->idttipo')";
			
		$insert = $this->ejecutar($sql);
			
			echo "<script>
			alert('Registro con exito');
			location.href='../vistas/registro_alimento.php';</script>";
			
		$sql="SELECT idtempleado from templeado ORDER BY idtempleado desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$ide=$busc['idtempleado'];
			
				if ( $this->asi_va() ) 
			{
			#Se insertan los datos
			$concepto=$_POST['concepto'];
		$sql="INSERT INTO tmovimiento(tipo_mov, fecha_mov, idtempleado, concepto_mov) values ('Entrada', current_date , '$ide', '$concepto')";
			$rs = $this->ejecutar($sql);
				echo ($sql);
			
		
				if ( $this->asi_va() ) 
			{	
		$sql="SELECT idtmovimiento from tmovimiento ORDER BY idtmovimiento desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$id2=$busc['idtmovimiento'];
				if($this->asi_va()){
			
				
		$sql="SELECT idtproducto from tproducto ORDER BY idtproducto desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$id=$busc['idtproducto'];
			if ( $this->asi_va() ) {
		
		$sql="INSERT INTO t_mov_detalle(idtmovimiento, idtproducto, gramaje_total) values ('$id2', '$id', '')";
		$rs = $this->ejecutar($sql);
		echo ($sql);


						}
					}
				}
			}
		}
	
	
		else{
			echo "<script>
			alert('Ya esta registrado');
			location.href='../vistas/registro_alimento.php';</script>";
	
		}
					if ( $this->asi_va() ) {
					$transaccion = true;
				}
		
			if ( $transaccion ) 	// se ejecuto la transaccion?
			$this->fin_trans(); 
			// Grabar
		else
			$this->deshacer_trans();	// Deshacer todo
	}
	
	
	function registrarlitros()
{error_reporting(0);
	$transaccion = false;
		$this->num = null;
		$this->inicio_trans();
		$sql1="SELECT  nombre_pro FROM tproducto where nombre_pro='$this->nombre'";
			$resultado= $this->ejecutar($sql1);
			$fila = mysql_num_rows($resultado);
				if($fila==0)
			{
			
		$sql="insert into tproducto(nombre_pro, existencia_pro, estatus_pro, idttipo) values ('$this->nombre','$this->cantidad','$this->estatus', '$this->idttipo')";
			
		$insert = $this->ejecutar($sql);
			
			echo "<script>
			alert('Registro con exito');
			location.href='../vistas/registro_alimento.php';</script>";
			
		$sql="SELECT idtempleado from templeado ORDER BY idtempleado desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$ide=$busc['idtempleado'];
			
				if ( $this->asi_va() ) 
			{
			$concepto=$_POST['concepto'];
		$sql="INSERT INTO tmovimiento(tipo_mov, fecha_mov, idtempleado, concepto_mov) values ('Entrada', current_date , '$ide', '$concepto')";
			$rs = $this->ejecutar($sql);
				echo ($sql);
			
		
				if ( $this->asi_va() ) 
			{	
		$sql="SELECT idtmovimiento from tmovimiento ORDER BY idtmovimiento desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$id2=$busc['idtmovimiento'];
				if($this->asi_va()){
			
				
		$sql="SELECT idtproducto from tproducto ORDER BY idtproducto desc";
			$resultado= $this->ejecutar($sql);
			$busc= mysql_fetch_array($resultado);
			$id=$busc['idtproducto'];
			if ( $this->asi_va() ) {
		
		$sql="INSERT INTO t_mov_detalle(idtmovimiento, idtproducto, gramaje_total) values ('$id2', '$id', '')";
		$rs = $this->ejecutar($sql);
		echo ($sql);


						}
					}
				}
			}
		}
	
	
		else{
			echo "<script>
			alert('Ya esta registrado');
			location.href='../vistas/registro_alimento.php';</script>";
	
		}
					if ( $this->asi_va() ) {
					$transaccion = true;
				}
		
			if ( $transaccion ) 	// se ejecuto la transaccion?
			$this->fin_trans(); 
			// Grabar
		else
			$this->deshacer_trans();	// Deshacer todo
	}
	
	
function consultar2()
	{	

		$sql="SELECT nombre_pro FROM tproducto where nombre_pro= '$this->nombre'";
		$tupla=$this->ejecutar($sql);
		if($this->asi_va())
			return $tupla;
		else
			return false;
	}
	
	function arreglo($rs)
	{
		return $this->elarreglo($rs);
	}
	function dbfecha( $fecha ){
		$fecha = substr($fecha,8,2)."-".substr($fecha,5,2)."-".substr($fecha,0,4);
		return $fecha;
	}

}
?>