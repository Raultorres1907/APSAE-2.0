<?php
include_once("../modelos/m_crear_almuerzos2.php");
error_reporting(0);
$Almacenar=new crear();
$cont_bie = $_POST["cont_bie"];#Los datos almacenador por la funcion javascript para que puedan ser registrados todo tiene que relizar un while para que reconozca cada dato
while ($cont_bie > 0)
{
	if(isset($_POST["idtproducto".$cont_bie]))
	{
		$Almacenar->setDatos($_POST["idtproducto".$cont_bie],$_POST['cantidad'],$_POST["proporcion".$cont_bie]);
		$Almacenar->preparar();
	
	}
	
	$cont_bie--;
}
echo "ero";
?>