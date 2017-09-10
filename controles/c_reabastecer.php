<?php
error_reporting(0);
include_once("../modelos/m_reabastece2.php");
$Almacenar=new nuevo();
$cont_bie = $_POST["cont_bie"];#Los datos almacenador por la funcion javascript para que puedan ser registrados todo tiene que relizar un while para que reconozca cada dato
while ($cont_bie > 0)
{
	if(isset($_POST["idtproducto".$cont_bie]))
	{
		$Almacenar->datos($_POST["idtproducto".$cont_bie],$_POST["existencia_pro".$cont_bie]*1000);
		$Almacenar->actualizar();
	
	}
	
	$cont_bie--;
}
echo "<script>
			alert('No cargo ningun producto');
			location.href='../vistas/v_reabastecer.php';</script>";
?>