<?php
session_start();
if(isset($_SESSION['usuario']))
{ 
  if($_SESSION['usuario']==1)

{
    #$Hora = $_SESSION["HoraEntrada"];
    #$ahora = date("Y-n-j H:i:s");
    #$lapso = strtotime($ahora)-strtotime($Hora);
    #if ($lapso >500) header("Location:../index.php");

   
  
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Principal</title>
    <!-- Hora -->
    <script type="text/javascript" src="../jss/facha.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="principal.php">Inicio</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php if(isset($_SESSION['persona'])) echo $_SESSION['persona']; ?></a>

                    
                </li>
            </ul>
            <!--  Elementos del menú de la barra lateral -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   
                 
                   
                    <li>
                        <a href="v_almuerzos.php"><i class="fa fa-fw fa-cutlery "></i>Almuerzo</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse in" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Inventario <i class="fa fa-fw fa-caret-down"></i></a>
                       <ul id="demo" class="collapse in">
                            <li class="active">
                                <a href="registro_alimento.php"><i class="fa fa-th-list" >&nbsp;Registrar Alimentos</i></a>
                            </li>
                            <li class="active">
                                <a href="v_reabastecer.php"><i class="fa fa-cubes" >&nbsp;Reabastecer Inventario</i></a>
                            </li>

                              <li class="active">
                                <a href="../productos/index.php"><i class="fa fa-fw fa-list">&nbsp;Listado</i></a>
                            </li>
                        </ul>
                    </li>


                     <li>
                        <a href="javascript:;" data-toggle="collapse in" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Menú <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse in">
                            <li>
                                <a href="v_registrar_menu.php"><i class="fa fa-fw fa-list-alt">&nbsp;</i>Registrar Menú</a>
                            </li>
                            <li>
                                <a href="v_consultar_menu.php"><i class="fa fa-fw fa-search">&nbsp;</i>Consultar Menú</a>
                            </li>

                            
                        </ul>
                    </li>

                    <li>
                        <a href="categoria.php"><i class="fa fa-fw fa-table"></i> Categoría</a>
                    </li>

                    <li>
                        <a href="registrar_tipo.php"><i class="fa fa-fw fa-table"></i>Registro de Categorías</a>
                    </li>

                     <li>
                        <a href="javascript:;" data-toggle="collapse in" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Usuario <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" >
                            <li>
                                <a href="registrar_cuenta.php"><i class="fa fa-fw  fa-align-justify"></i>Registrar Usuario</a>
                            </li>
                            <li>
                                <a href="consultar_cuentas.php"><i class="fa fa-fw fa-align-justify">&nbsp;</i>Lista de Usuario</a>
                            </li>

                            
                        </ul>
                    </li> 
                    <li>
                        <a href="../pdf/index.php" target="complete"><i class="fa fa-fw fa-edit"></i>Generar Remanente</a>
                    </li> 


                    <li>
                        <a target="_blank" href="../manual/Manual-usuario.PDF"><i class="fa fa-fw fa-question-circle"></i>Ayuda</a>
                    </li> 


                    <li><a href="../controles/c_destruir.php" title="Click  para salir del sistema">Cerrar Sesión</a></li>



                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-header">
                          Sistema de Alimentación Escolar
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                
              <center>
                <img src="../imagenes/cocina.png" width="600">
               </center> 

               <div style="height: 80px;">
                          
                      </div>
                 
               
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <div>
            
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../jss/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../jss/bootstrap.min.js"></script>


<?php
}
 
  else{ // entro pero este no es el nivel autorizado
    header("Location:../index.php");
  }
 } 
else{  // trata de entrar sin autenticar
  header("Location:../index.php");
}
?>

</body>

</html>
