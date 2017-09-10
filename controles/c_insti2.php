<?php
#Acá manda los datos al formulario (SELECT DINAMICO)
function dibCboIns($idtmunicipio){
  include_once("../modelos/m_insti2.php");
  $objin = new institucion2();

  $seleccionado = "";
  $x = 0;
  $cboin = ARRAY();
  
    $cboin[$x++] = "<select name='institucion' id='institucion' class='form-control' style='width:70%; ' title='Seleccione institucion' data-toggle='tooltip'><option value='0'>Institucion</option>";

    $rs = $objin->consultaTodos();
  while ( $tupla = $objin->arreglo( $rs ) )
  {
    $value = $tupla["idtinstitucion"];
    $nombre = $tupla["nombre_inst"];
    if( $idtmunicipio == $value)
    {
      $seleccionado = "selected='selected'";
    }
    else
    {
      $seleccionado = "";
    }

    $cboin[$x++] = "<option value='".$value."' ".$seleccionado." >".$nombre."  </option>";
  }
  $cboin[$x++] = "</select>";

  return $cboin;
}
?>