<?php
#Acá manda los datos al formulario (SELECT DINAMICO)
function dibCboIns($idtmunicipio){
  include_once("../modelos/m_insti.php");
  $objin = new institucion();

  $seleccionado = "";
  $x = 0;
  $cboin = ARRAY();
  
    $cboin[$x++] = "<select name='municipio' id='municipio' class='form-control' style='width:23%; ' title='Seleccione municipio' data-toggle='tooltip'><option value='0'>municipio</option>";

    $rs = $objin->consultaTodos();
  while ( $tupla = $objin->arreglo( $rs ) )
  {
    $value = $tupla["idtmunicipio"];
    $nombre = $tupla["nombre_mun"];
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