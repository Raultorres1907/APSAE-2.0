<?php
include_once("../modelos/m_registro.php");
$tipo = $_POST['tipo'];
switch ($tipo) {
	case 1:
		gramos();
		break;
	
	case 2:
		litros();
		break;
}

function gramos()
{
	error_reporting(0);
$o_ho= new ingredientes();
$cont_bie=$_POST["cont_bie"];#Los datos almacenador por la funcion javascript para que puedan ser registrados todo tiene que relizar un while para que reconozca cada dato
while($cont_bie > 0)
{
if(isset($_POST["nombre".$cont_bie]))
$o_ho->setDatos($_POST["nombre".$cont_bie], $_POST["cantidad".$cont_bie]*1000, $_POST["estatus"],$_POST['idttipo'.$cont_bie]);
$o_ho->registrargramos();
$cont_bie--;	
}
	
}
	echo "<script>
			alert('No registro ningun producto');
			location.href='../vistas/registro_alimento.php';</script>";

function litros()
{
	error_reporting(0);
$o_ho= new ingredientes();
$cont_bie=$_POST["cont_bie"];#Los datos almacenador por la funcion javascript para que puedan ser registrados todo tiene que relizar un while para que reconozca cada dato
while($cont_bie > 0)
{
if(isset($_POST["nombre".$cont_bie]))
$o_ho->setDatos($_POST["nombre".$cont_bie], $_POST["cantidad".$cont_bie]*1000, $_POST["estatus"],$_POST['categoria'.$cont_bie]);
$o_ho->registrarlitros();
$cont_bie--;	
}
	
}
	echo "<script>
			alert('No registro ningun producto');
			location.href='../vistas/registro_alimento.php';</script>";
?>