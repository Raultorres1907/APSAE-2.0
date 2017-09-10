<!DOCTYPE html>
<html>
<head>
  <title>Recuperar Contraseña </title>
    <link rel="stylesheet" type="text/css" href="../diseno.css">
     <!-- se hace el llamado al jquery para hacer el trabajo mas facil en javascrpit -->
  <script type="text/javascript" src="../jss/jquery-3.1.1.min.js"></script>
  <!-- llamada al javascript -->
  <script type="text/javascript" src="../jss/Recuperar.js"></script>
  <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <div class="container">
    <h1 class="welcome text-center"> <br></h1>
        <div class="card card-container">
        <h2 class='login_title text-center' style="color: black">Sistema de alimentación Escolar</h2>
        <h3 class='login_title text-center' style="color: black">Cambiar Contraseña</h3>

        <center><table border="0" cellpadding="10" cellspacing="">
  <tr>
  <td>

  <br>
  <br>
  <div id="Usu">
  
  <input type="text" class="form-control" id="usuario" placeholder="Introduzca su usuario">

  <br>
  <div class="form-group">
  <button style="margin-left:35%; height:30px;width: 80px" type="button" class="btn btn-primary btn-xs" id="boton">Enviar</button>
  <br>
  
  
   <button type="button" style="margin-left:35%; margin-top:4%  ;  height:30px;width: 80px;" class="btn btn-warning"><a style="color: white; text-decoration: none;"  href="../index.php">Volver</a></button>
  </div>
  </div>


  <!-- si el usuario se encuentra el siguiente campo aparece -->
  <!-- se encierra dentro de un DIV para ocultarlo con un stilo css display: none -->
  <div id="Comprobar" style="display: none">
  <br>
  <span id="Pregunta"></span>
  <input type='text' class="form-control"  id='Respuesta' placeholder='Respuesta'>
  <br>
  <button type='button' id='boton2' style="margin-left:35%; height:30px;width: 80px"  class="btn btn-warning btn-xs">Comprobar</button>
  </div>
  <!-- si la respuesta es correcta el siguiente campo aparece -->
  <!-- se encierra dentro de un DIV para ocultarlo con un stilo css display: none -->
  <div id="NuevaPass" style="display: none">
  <input type='password' class="form-control" id='Pass1' placeholder='Nueva Contraseña'>
  <br>
  <input type='password' class="form-control" id='Pass2' placeholder='Repita la contraseña'>
  <br>
  <button type='button' id='boton3' style="margin-left:35%; height:30px;width: 80px" class="btn btn-success btn-xs">Cambiar</button>

  </div>
  </td>
  </tr>
  </table></center>

    

        


        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>