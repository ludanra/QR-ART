<?php

   session_start();

   $nombre = $_SESSION['nombre_usu'];
   $usuario= $_SESSION['usuario'];
   $apellido= $_SESSION['apellido_usu'];
   $cod_perfil= $_SESSION['cod_perfil'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR-ART</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../assets/backadmin.css">
    <!-- Daterange picker -->
</head>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
            <div class="info ">
                <a href="# " class="d-block "> <?php echo "Usuario: "; echo $usuario;?></a>
                <a href="# " class="d-block "><?php echo " Perfil: Mozo";?></a>

             
            </div>
        </div>

        <a href="./perfil_mozo.php" class="nav-link active ">

            <p>
                Inicio
            </p>
        </a>


        <a href="../perfil_admin/abm_user/Salir.php" class="nav-link active ">
                <i class="far fa-circle nav-icon "></i>
                <p>Cerrar Sesión</p>
        </a>


    </div>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header ">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-7">
                    <h1 class="text-right"><?php echo 'Bienvenid@ ' .$nombre." ". $apellido;?> </h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
 
   
        <div class="container-fluid ">
            <!-- Small boxes (Stat box) -->
            <div class="row ">
                
                <!-- ./col -->
                <div class="col-lg-12 col-6 ">
                    <!-- small box -->
                    <a class="small-box bg-success " href="../perfil_mozo/pedidos/abm_pedidos_m.php">
                        <div class="inner ">

                            <p class="text-center">Administración De Pedidos </p>
                        </div>                            
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-12 col-6 ">
                    <!-- small box -->
                    <a class="small-box bg-warning " href="./productos/abm_productos_m.php">
                        <div class="inner ">
                            <p class="text-center">Administración De Productos</p>
                        </div>
                        <div class="icon ">
                            <i class="ion ion-person-add "></i>
                        </div>
                        
                        </a>
                </div>
                <!-- ./col -->
                <div class="col-md-12 col-6 ">
                    <!-- small box -->
                    <a class="small-box bg-danger " href="./extras/abm_extras_m.php">
                        <div class="inner ">

                            <p class="text-center">Administración De Extras</p>
                        </div>
                        <div class="icon ">
                            <i class="ion ion-pie-graph "></i>
                        </div>
                        </a>
                </div>

             
                <!-- ./col -->
            </div>
        </div>
        <!-- /.card-body -->


        <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>

        </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>