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
<aside class="main-sidebar sidebar-dark-primary elevation-2 ">

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 pb-2 sm-3 d-flex ">
            <div class="info ">
           <a href="# " class="d-block "><?php echo "Usuario: "; echo $usuario;?></a>
            <a href="# " class="d-block "><?php echo "Perfil: Caja";?></a>
            
              
                
            </div>
        </div>


        <a href="../perfil_admin/abm_user/Salir.php" class="nav-link active ">
            
            Cerrar Sesión <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
<path d="M7.5 1v7h1V1h-1z"/>
<path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg>
        </a>


    </div>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header ">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-12" style="right:50px">
                    <h4 class="text-center text-dark"><?php echo 'Bienvenid@ ' .$nombre." ". $apellido;?> </h4>
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
                <div class="col-sm-2 col-sm-3 " style="left:370px">
                    <!-- small box -->
                    <a class="small-box bg-success " href="./pedidos/abm_pedidos_p.php">
                        <div class="inner ">

                            <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
</svg> <br>Administración De Pedidos  </p>
                        </div>                            
                    </a>
                </div>
                <!-- ./col -->
                
             
                <!-- ./col -->
            </div>
        </div>
        <!-- /.card-body -->


        <footer class="py-2 mt-2 border-top bg-dark fixed-bottom">
            <p class="col-sm-7 mb-0 text-light text-right">QR-ARTⒸ2022</p>

        </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>