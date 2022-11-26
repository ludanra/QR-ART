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
            <a href="# " class="d-block "><?php echo "Perfil: Administrador";?></a>
            
              
                
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
                <div class="col-sm-12">
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
                <div class="col-sm-2 col-sm-3 ">
                    <!-- small box -->
                    <a class="small-box bg-info " href="../perfil_admin/abm_user/abm_usuarios.php">
                        <div class="inner ">
                            <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg><br>Administración De Usuario </p>
                        </div>
                        
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-sm-2 col-sm-3 ">
                    <!-- small box -->
                    <a class="small-box bg-success " href="../perfil_admin/abm_pedidos/abm_pedidos.php">
                        <div class="inner ">

                            <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
</svg> <br>Administración De Pedidos  </p>
                        </div>                            
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-sm-2 col-sm-3">
                    <!-- small box -->
                    <a class="small-box bg-warning " href="./abm_productos/abm_productos.php">
                        <div class="inner ">
                            <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
</svg> <br>Administración De Productos </p>
                        </div>
                        
                        
                        </a>
                </div>
                <!-- ./col -->
                <div class="col-sm-2 col-sm-3 ">
                    <!-- small box -->
                    <a class="small-box bg-danger " href="../perfil_admin/abm_extras/abm_extras.php">
                        <div class="inner ">

                            <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cup-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.11 3.187A.5.5 0 0 1 .5 3h13a.5.5 0 0 1 .488.608l-.22.991a3.001 3.001 0 0 1-1.3 5.854l-.132.59A2.5 2.5 0 0 1 9.896 13H4.104a2.5 2.5 0 0 1-2.44-1.958L.012 3.608a.5.5 0 0 1 .098-.42Zm12.574 6.288a2 2 0 0 0 .866-3.899l-.866 3.9Z"/>
</svg><br>Administración De Extras  </p>
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


        <footer class="py-2 mt-2 border-top bg-dark fixed-bottom">
            <p class="col-sm-7 mb-0 text-light text-right">QR-ARTⒸ2022</p>

        </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>