<?php
#Acá manda los datos al formulario (SELECT DINAMICO)
function dibCboEst($idtestado){
	include_once("../modelos/m_estadoP.php");
	$objEs = new estadoP();

	$seleccionado = "";
	$x = 0;
	$cboEs = ARRAY();
	
    $cboEs[$x++] = "<select name='estado' id='estado' class='form-control' style='width:23%; ' title='Seleccione estado' data-toggle='tooltip'><option value='0'>Estado</option>";

    $rs = $objEs->consultaTodos();
	while ( $tupla = $objEs->arreglo( $rs ) )
	{
		$value = $tupla["idtestado"];
		$nombre = $tupla["nombre_est"];
		if( $idtestado == $value)
		{
			$seleccionado = "selected='selected'";
		}
		else
		{
			$seleccionado = "";
		}

		$cboEs[$x++] = "<option value='".$value."' ".$seleccionado." >".$nombre."  </option>";
	}
	$cboEs[$x++] = "</select>";

	return $cboEs;
}
?>