<?php
#Acá manda los datos al formulario (SELECT DINAMICO)
function dibCboProduc($idtproducto){
	include_once("../modelos/m_reabastece.php");
	$objPro = new ingrediente();

	$seleccionado = "";
	$x = 0;
	$cboPro = ARRAY();
	
    $cboPro[$x++] = "<select class='select2 col-xs-10' style='width:48%;'  name='idtproducto' id='idtproducto' title='Ingrese Ingrediente' data-toggle='tooltip'><option value='0'>Buscar Ingrediente</option>";

    $rs = $objPro->consultaTodos();
	while ( $tupla = $objPro->getTuplas( $rs ) )
	{
		$value = $tupla["idtproducto"];
		$nombre = $tupla["nombre_pro"];
		if( $idtproducto == $value)
		{
			$seleccionado = "selected='selected'";
		}
		else
		{
			$seleccionado = "";
		}

		$cboPro[$x++] = "<option value='".$value."' ".$seleccionado." >".$nombre."  </option>";
	}
	$cboPro[$x++] = "</select>";

	return $cboPro;
}
?>