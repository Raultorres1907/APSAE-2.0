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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../jss/menu.js"></script>
    <script type="text/javascript" src="../jss/registro_multiples.js"></script>



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
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Usuario <i class="fa fa-fw fa-caret-down"></i></a>
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
                         Registro de Alimentos
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->



               
            <!-- /.container-fluid -->

                          <form name="registrar" id="registrar" method="POST" action="../controles/c_registro.php" class="form-horizontal">
                      <div style=" height: 550px; margin-left: 50px;  ">
                       
                           
                        <div class="form-grup">
                          <label  for="nombre" class="control-label col-xs-2">Nombre: </label> 
                          <input placeholder="nombre del producto"  maxlength="20"  title="Ingrese Nombre" style="width: 220px; margin-right: 50px;" class="form-control col-xs-10 "type="text" name="nombre" id="nombre" required>
                          
                       
                        </div>
                        
  
                        <div class="form-group">

                                <!--Select dinamico extrae los datos del controlador c_categoria.php -->
                           <?php


                        include_once("../controles/c_categoria.php");
                          $elCboTi = array();
                          $idttipo = "";
                          $x=0;
                          if( isset($_GET["idttipo"])) 
                          $idttipo = $_GET["idttipo"];
                          $cboTi = dibCboTipo( $idttipo );
                          foreach ($cboTi as $elCboTi) 
                          echo $elCboTi;
                          
                        ?> 

                       



                          </div>

                          


                            <div class="form-group">
                              <label  for="cantidad" class="control-label col-xs-2">Cantidad: </label>
                                  <div class="col-md-10">
                                    <input  style="width: 200px; " class="form-control col-xs-10 " type="number" name="cantidad" id="cantidad" placeholder="cantidad del producto">
                                  <div> 

                            </div><br><br><br>

                           <div class="form-group">
                           
                              <select class="form-control" class='form-control  ' style='width: 170px;  margin-right: 50px'  name="tipo" id="tipo2" value=0>
                                  <option>Unidad </option>
                                    <option value="1">Kilos</option>
                                    <option value="2">Litros</option>
                                 </select> 
                            </div>

                                 
                                <br>
                                <br>


                        <div class="form-group">
                        <label class="control-label col-xs-2">Estado: </label>
                        <div class="col-md-2">
                            <label class="radio-inline">
                                 <input type="radio" name="estatus" id="estatus" value="1">Activo  
                                 
                            </label>
                        </div>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="estatus" id="estatus" value="0">Inactivo
                            </label>
                        </div>
                            
                            
                    

                    <br>
                    <!--Datos almacenan en la parte infier ya que una funcion de javascript hace que se agrupen y al momento de darle registrar ese conjunto de datos se almacenen en la base de datos -->
                    <div style="width: 150px;  ">
                        <table id="detalle" class="table table-hover"  >
                          <tbody>
                        <td>Ingrediente</td>
                        <td>Categoria</td>
                        <td style="width:10%">Cantidad</td>
                        <td style="width:10%">Retirar</td>

                       
                        <input type="hidden" name="cont_bie" id="cont_bie" value="0"> 

                                              
                        </div>
                    </div>
                    <br><br><br>
                        <textarea  style="resize:none;width:400px;height:100px;" class="form-control" name="concepto"  id="concepto" placeholder="Defina el concepto"   required ></textarea>

                        <br>
                        <br>

                        <center>
                        <div class="form-group">
                        <input type="button"  class="btn btn-primary" value="Agregar" onClick="fagregar()" >
                        <button class="btn btn-success" onClick="incluir()" >Registrar</button>
                        </center>
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
