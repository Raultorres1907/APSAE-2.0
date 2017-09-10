
<?php
	include_once("remanente.php");
	include_once("conexion.php");
	
	$sql = "SELECT nombre_pro, existencia_pro, categoria_tipo FROM tproducto INNER JOIN ttipo";
	$resultado = mysql_query($sql);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Nombre',1,0,'C',1);
	$pdf->Cell(20,6,'existencia',1,0,'C',1);
	$pdf->Cell(70,6,'categoria',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = mysql_fetch_array())
	{
		$pdf->Cell(70,6,utf8_decode($row['nombre_pro']),1,0,'C');
		$pdf->Cell(20,6,$row['existencia_pro'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['categoria_tipo']),1,1,'C');
	}
	$pdf->Output();
?>