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
    <script src="../jss/jquery.js"></script>
    <script src="../jss/myjava.js"></script>

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
                
                <a class="navbar-brand" href="../vistas/principal.php">Inicio</a>
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
                        <a href="../vistas/v_almuerzos.php"><i class="fa fa-fw fa-cutlery "></i>Almuerzo</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse in" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Inventario <i class="fa fa-fw fa-caret-down"></i></a>
                       <ul id="demo" class="collapse in">
                            <li class="active">
                                <a href="../vistas/registro_alimento.php"><i class="fa fa-th-list" >&nbsp;Registrar Alimentos</i></a>
                            </li>
                            <li class="active">
                                <a href="../vistas/v_reabastecer.php"><i class="fa fa-cubes" >&nbsp;Reabastecer Inventario</i></a>
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
                                <a href="../vistas/v_registrar_menu.php"><i class="fa fa-fw fa-list-alt">&nbsp;</i>Registrar Menú</a>
                            </li>
                            <li>
                                <a href="../vistas/v_consultar_menu.php"><i class="fa fa-fw fa-search">&nbsp;</i>Consultar Menú</a>
                            </li>

                            
                        </ul>
                    </li>

                    <li>
                        <a href="../vistas/categoria.php"><i class="fa fa-fw fa-table"></i> Categoría</a>
                    </li>

                     <li>
                        <a href="../vistas/registrar_tipo.php"><i class="fa fa-fw fa-table"></i>Registro de Categorías</a>
                    </li>


                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Usuario <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" >
                            <li>
                                <a href="../vistas/registrar_cuenta.php"><i class="fa fa-fw  fa-align-justify"></i>Registrar Usuario</a>
                            </li>
                            <li>
                                <a href="../vistas/consultar_cuentas.php"><i class="fa fa-fw fa-align-justify">&nbsp;</i>Lista de Usuario</a>
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
                         Inventario
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <section>
   
  
    <table border="0" align="center">
        <tr>
            <td width="335"><div class="col-lg-6">
                <div class="input-group" >
                 
                  <input type="text" placeholder="Buscar ingredientes" style="width: 250px" class="form-control"  id="bs-prod" >
               </div>
             
         </tr>
    </table>
    </section>

    <br><br>

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Edita un Producto</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
                <table border="0" width="80%" >
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="idtproducto" name="idtproducto" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                      <tr>
                        <td>Estado: </td>
                        <td><select required="required" name="estado" id="estado">
                                <option value="">Seleccionar</option>
                                <option value="1">Activo</option>
                                <option value="0">inactivo</option>
                            </select></td>
                    </tr>
               
                    <tr>
                        <td colspan="2">
                            <div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>


            </form>


          </div>
        </div>
      </div>
      



            </div>
            <!-- /.container-fluid -->

         <div style="height: 250px;">
                          
         </div>

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
