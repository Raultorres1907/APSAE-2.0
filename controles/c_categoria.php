<?php
#SELECT DINAMICO se muestran los datos en el formulario
function dibCboTipo($idttipo){
	include_once("../modelos/m_categoria.php");
	$objTi = new categoria();

	$seleccionado = "";
	$x = 0;
	$cboTi = ARRAY();
	
    $cboTi[$x++] = "<select name='idttipo' id='idttipo' class='form-control' style='width:23%; ' title='Ingrese Ingrediente' data-toggle='tooltip'><option value='0'>Categoria</option>";

    $rs = $objTi->consultaTodos();
	while ( $tupla = $objTi->getTuplas( $rs ) )
	{
		$value = $tupla["idttipo"];
		$nombre = $tupla["categoria_tipo"];
		if( $idttipo == $value)
		{
			$seleccionado = "selected='selected'";
		}
		else
		{
			$seleccionado = "";
		}

		$cboTi[$x++] = "<option value='".$value."' ".$seleccionado." >".$nombre."  </option>";
	}
	$cboTi[$x++] = "</select>";

	return $cboTi;
}
?>