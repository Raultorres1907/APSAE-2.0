<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="diseno.css">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body >
    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <div class="container"><!-- Creamos el contenedor principal-->
    <h1 class="welcome text-center"> <br></h1>
        <div class="card card-container" >
        <center>
        <h2 class='login_title text-center' style="color: black ; ">Sistema de Alimentación Escolar</h2>
        </center>
        <hr>
        <!-- Acá empieza el formulario-->
            <form class="form-signin" action="controles/c_login.php" name="inicio" method="POST" id="inicio" onsubmit="return validar(this)">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Usuario</p><!--Acá es donde el usuario coloca su usuario -->

                <input type="text" id="inputEmail" name="idper" id="idper" class="login_box" placeholder="Ingrese usuario" required autofocus>
                <p class="input_title">Contraseña</p> <!-- Acá es donde el usuario coloca su clave-->
                <input type="password" id="inputPassword" class="login_box" placeholder="******" required name="claveper" id="claveper">
                <div id="remember" class="checkbox">

                    <label>
                      <a style="text-decoration: none" href="vistas/recuperar.php"> Recuperar Contraseña</a>
                    </label>
                    <br>
                    <br>

                </div>
                <button style="" class="btn btn-lg btn-sucess" type="submit">Iniciar</button><br>

               <a href="index.php" style="  height:55px;width: 300px; color: #2E2E2E" class="btn btn-lg btn-warning " role="button">Volver</a>

                

            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
<?php
  if(isset($_GET['error_clave']))
    if($_GET['error_clave']==1)
      echo "<script type='text/javascript'>alert ('Usuario o clave incorrecto')</script>";
?>
</html>