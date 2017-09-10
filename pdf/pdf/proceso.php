<?php
session_start();
if(!isset($_SESSION['usuario']))
{ header("Location:../../controles/c_logout.php");
}

include_once("../modelo/m_consulta.php");
include_once("../fpdf/fpdf.php");
class pagina extends FPDF
{
	function header()
	{
		$this->Image('../../imagenes/cnae.jpg',4,-31,50,90);
		$this->Image('../../imagenes/logo.jpg',165,0,50,30);
        $this->Ln(20);

	}
	function footer()
	{
		$this->SetFont('Arial','',10);
		$this->SetY(-15);
		$this->cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
	

			//Salto de línea

	}
}
$obj= new reporte();
$objetivo= $obj->consultar();
$pdf= new pagina();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','BI',14);
$pdf->cell(1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,4,utf8_decode('Remanente del inventario'),0,1,'C');
$pdf->Ln(1);
$pdf->Cell(0,4,utf8_decode('Sistema de Alimentación Escolar (SAE).'),0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',11);
$pdf->cell(35);
$pdf->cell(30,10,'Nombre',1,0,'C');
$pdf->cell(30,10,'Cantidad G/CC',1,0,'C');
$pdf->cell(30,10,'Cantidad K/L',1,0,'C');
$pdf->cell(30,10,'Categoria',1,0,'C');



$pdf->Ln(10);
while ($tupla = $obj->arreglo($objetivo))
{
			$cantidad1= 1000;
			

	$Nombre= $tupla['nombre_pro'];
	$existencia=$tupla['existencia_pro'];
	$Gramos= ($existencia/$cantidad1);
	$categoria= $tupla['categoria_tipo'];

	$pdf->cell(35);

	$pdf->cell(30,10,$Nombre,1,0,'C');
	$pdf->cell(30,10,$existencia,1,0,'C');
	$pdf->cell(30,10,$Gramos,1,0,'C');
	$pdf->cell(30,10,$categoria,1,0,'C');



	$pdf->Ln(10);
}

$pdf->Ln(20);
$pdf->cell(70);
$objetivo2= $obj->consultarper();
$tupla2 = $obj->arreglo($objetivo2);
$Nombre=$tupla2['nombre_emp'];
$Cedula=$tupla2['idtempleado'];
$Apellido=$tupla2['apellido_emp'];
$cargo=$tupla2['cargo_emp'];
if($cargo==1);
{
$pdf->SetFont('Arial','BI',11);
$pdf->cell(40,10,'Generado Por: ' .$_SESSION['persona'] .' '. $_SESSION['apellido'].'  C.I  '.$_SESSION['cedula'],0,0,'C');	
}
$pdf->Ln(10);
$pdf->Cell(70);
$pdf->cell(70,10,'Firma ______________ ');
$pdf->Ln(10);
$pdf->Cell(120);
$FechaActual=date("d/m/Y");
date_default_timezone_set('America/Caracas');
$Hora = date('h:i:s A');
$pdf->cell(50,10,'Fecha: '.$FechaActual,0,1,'C',0);
$pdf->cell(50,10,'Hora:'.$Hora,0,0,'C',0);

	

$pdf->Output();

?>