<?php

   session_start();

   $nombre = $_SESSION['nombre_usu'];
   $usuario= $_SESSION['usuario'];
   $apellido= $_SESSION['apellido_usu'];


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
    <link rel="stylesheet " href="../../../assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/backpedi.css">
    <link rel="stylesheet " href="../../../assets/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Daterange picker -->
</head>

<body>
    <nav>
        <h5 class="text-sm-center text-light">Administración De Pedidos <br><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
</svg></h5>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4 ">

        <!-- Sidebar -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
            <div class="info ">
           <a href="# " class="d-block "><?php echo "Usuario: "; echo $usuario;?></a>
            <a href="# " class="d-block "><?php echo "Perfil: Caja";?></a>
            
              
                
            </div>
        </div>

            <a href="../perfil_caja.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Inicio <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25p%" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
                    <i class="bi bi-house"></i>
                </p>
            </a>

     
       

            <a href="../../../login.php" class="nav-link active ">
                <i class="far fa-circle nav-icon "></i>
                <p>Cerrar Sesión <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
  <path d="M7.5 1v7h1V1h-1z"/>
  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg></p>
            </a>


        </div>
    </aside>
    <br>
    <br>
    <br>
    <br>

    <div class="d-grid gap-4 col-6 mx-auto">
        <a href="./pedidos_p.php" button class="btn btn-success btn-sm" type="button">Mis Pedidos</a>
       
    </div>



    <footer class="py-2 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

     </footer>
















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>