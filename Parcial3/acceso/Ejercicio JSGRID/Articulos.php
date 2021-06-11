<?php

session_start();
if(isset($_SESSION['usuario'])){

    echo $_SESSION['usuario'];

    $usuario = 'root';
    $password = '';
    $db = new PDO('mysql:host=localhost;dbname=montelongoza', $usuario, $password);


}else{

    header("Location: login.html");
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Articulos</title>
        <link href="css/styles.css" rel="stylesheet" />

        <link type = "text/css" rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css"/>   
        <link type = "text/css" rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="Inicio.php">TERE</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Ajustes</a>
                        <a class="dropdown-item" href="#">Ingresos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Cerrar Session</a>
                    </div>
                </li>
            </ul>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Incio</div>
                            <a class="nav-link" href="Inicio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ingreso de Datos
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Session Inciada:</div>
                        <?php

                            echo $_SESSION['usuario'];

                        ?>

                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Articulos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Inicio.php">Incios</a></li>
                            <li class="breadcrumb-item active">Tabla Articulos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <button type="button" id="NuevoArticulo" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoArticulo">Nuevo Articulo</button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Grid Articulos
                            </div>
                            <div class="card-body">
                                <div id="jsGrid">
                                    
                                </div id="jsGrid"></div>
                            </div>
                            <div id="modalNuevoArticulo" class="modal fade">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Ingreso de Articulos</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">

                                     <div class="form-group">

                                        <label>Codigo Del Articulo:</label>
                                        <input type="email" class="form-control form-control-lg" id="CodigoArticulo">
                                        
                                      </div>
                                      <div class="form-group">

                                        <label>Nombre del Articulo:</label>
                                        <input type="text" class="form-control form-control-lg" id="NombreArticulo">

                                      </div>
                                      <div class="form-group">

                                        <label>Marca del Articulo:</label>
                                        <input type="text" class="form-control form-control-lg" id="MarcaArticulo">

                                      </div>
                                       <div class="form-group">

                                        <label>UM:</label>
                                        <select class="form-control form-control-lg" id="selectUM">
                                          <option value="0">Seleccione:</option>
                                            <?php
                                                $query = $db->prepare("SELECT * FROM montelongoza.cat_unidadmedidad");
                                                $query->execute();
                                                $data = $query->fetchAll();

                                                foreach ($data as $valores):
                                                    echo '<option value="'.$valores["id"].'">'.$valores["Abreviado"].'</option>';
                                                endforeach;
                                            ?>
                                        </select>

                                      </div>
                                      <div class="form-group">

                                        <label>Proveedores:</label>
                                        <select class="form-control form-control-lg" id="selectProveedores">
                                         <option value="0">Seleccione:</option>
                                            <?php
                                                $query = $db->prepare("SELECT * FROM montelongoza.p_proveedores");
                                                $query->execute();
                                                $data = $query->fetchAll();

                                                foreach ($data as $valores):
                                                    echo '<option value="'.$valores["id"].'">'.$valores["Nombre"].'</option>';
                                                endforeach;
                                            ?>
                                        </select>

                                      </div>
                                      <div class="form-group">

                                        <label>Tipo de Articulo:</label>
                                        <select class="form-control form-control-lg" id="selectTipodeArticulo">
                                          <option value="0">Seleccione:</option>
                                            <?php
                                                $query = $db->prepare("SELECT * FROM montelongoza.cat_tipoarticulos");
                                                $query->execute();
                                                $data = $query->fetchAll();

                                                foreach ($data as $valores):
                                                    echo '<option value="'.$valores["id"].'">'.$valores["TipoArticulo"].'</option>';
                                                endforeach;
                                            ?>
                                        </select>
                                        </select>

                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-primary" id="GuardarArticulo">Guardar</button>

                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
              
                </main>

                <footer class="py-4 bg-light mt-auto">
                    
                </footer>
            </div>
        </div>
         
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js" > </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
