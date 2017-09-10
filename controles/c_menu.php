<?php
error_reporting(0);
include_once("../modelos/m_menu.php");
$Almacenar=new menu();
$cont_bie = $_POST["cont_bie"];#Los datos almacenador por la funcion javascript para que puedan ser registrados todo tiene que relizar un while para que reconozca cada dato
while ($cont_bie > 0)
{
	if(isset($_POST["idmenu"]))
	{
		$Almacenar->setDatos($_POST['idmenu'],$_POST['nombre'],$_POST['estado']);
		$Almacenar->cargarmenu1();
	
	
	}
	
	$cont_bie--;
	
		
	
}
$cont_bien = $_POST["cont_bie"];#Los datos almacenador por la funcion javascript para que puedan ser registrados todo tiene que relizar un while para que reconozca cada dato
while ($cont_bien > 0)
{
	if(isset($_POST["idtproducto".$cont_bien]))
	{
		$Almacenar->datos($_POST['idtproducto'.$cont_bien], $_POST['existencia_pro'.$cont_bien]);
		$Almacenar->cargarmenu2();

	}
	
	$cont_bien--;
	
		
	
}
echo "<script>
			alert('No ha registrado nada');
			location.href='../vistas/v_registrar_menu.php';</script>";
?>