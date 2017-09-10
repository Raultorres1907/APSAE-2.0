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
     <script src="../jquery/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="../jss/facha.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../jss/probando.js"></script>
    <link href="../css/select2.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../jss/select2.js"></script>

 
    <script>
    $(document).ready(function(){    
    $(".select2").select2({
    minimumInputLength: 2
    });    
    });
    </script>


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
                          Elaboración de Almuerzos
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                
                <form  class="form-horizontal" name="pantalla" id="pantalla" method="POST" action="../controles/c_almuerzos.php">
                             <div style=" height: 550px; margin-left: 4%;  ">
                    <!--Select dinamico trae los alimentos por medio de los datos que son llamados en el controlador c_reaba.php -->
                            <div class="form-group">
                        <label class="control-label col-xs-2 ">
                           Nombre: 
                        </label>

                          <?php
                        include_once("../controles/c_reaba.php");
                          $elCboPro = array();
                          $idtproducto = "";
                          $x=0;
                          if( isset($_GET["idtproducto"])) 
                          $idtproducto = $_GET["idtproducto"];
                          $cboPro = dibCboProduc( $idtproducto );
                          foreach ($cboPro as $elCboPro) 
                          echo $elCboPro;
                          
                        ?> 

                      </div>

                       <div class="form-group">
                       <label class="control-label col-xs-2 ">
                            Gramaje: <!--Gramaje que tendrá cada ingrediente al momento de preparar el almuerzo -->
                        </label>
                          <div  class="col-xs-10">
                           <input class="form-control" style="width: 22%; " type="number" name="proporcion" id="proporcion"  required >
                            </div>
                            <br>
                            <br>
                            <br>
                                <div class="form-group">
                       <label class="control-label col-xs-2 ">
                            Cantidad Alumnos: 
                            <!--Cantidad de Alumnos al momento de la salida del almuerzo -->
                        </label>
                          <div  class=" col-xs-10">
                           <input class="form-control" style="width: 22%; " type="number" name="cantidad" id="cantidad"  required >
                            </div>
                            
                       

                     <br>
                     <br>
                    <br>

                    <center>
                       <input type="button"  class="btn btn-primary" value="Agregar" onClick="fagregar()" >
                         <button class="btn btn-success " onClick="proceso()">Preparar </button>
                    </center>
    
                        
            
                      
                       </div> 
                          <div style="width:50%;  ">
                         <!-- Datos se almacenan en la parte inferior por medio de una funcion javascript-->
                        <table id="detalle" class="table table-hover" style="margin-left: 50%" >
                          <tbody>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Gramaje</td>
                        <td style="width:100">Retirar</td>
                        
                       
                        <input type="hidden" name="cont_bie" id="cont_bie" value="0">
                        </tbody>
                        </table>


                      </div>
                    
                      </div>

                      </div>




                  
                     </form>
                 
               
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <div>
            
        </div>

    </div>
    <!-- /#wrapper -->

    

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
