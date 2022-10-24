<?php

   session_start();

   $nombre = $_SESSION['nombre_usu'];
   $usuario= $_SESSION['usuario'];
   $apellido= $_SESSION['apellido_usu'];


?>



<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet " href="../../../assets/backp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Daterange picker -->
</head>

<body>
    <nav>
        <h3 class="text-sm-center text-light">Administración De Productos🍔</h3>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4 ">

        <!-- Sidebar -->
        <div class="sidebar ">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
          
          <a class="d-block "><?php echo $usuario;?></a>
             </div>

            <a href="../perfil_mozo.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Inicio
                    <i class="bi bi-house"></i>
                </p>
            </a>


            <a href="../pedidos/abm_pedidos_m.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Pedidos🗒️

                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
            <a href="../extras/abm_extras_m.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Extras🍟
                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>


           

            <a href="../../../login.php" class="nav-link active ">
                <i class="far fa-circle nav-icon "></i>
                <p>Cerrar Sesión</p>
            </a>


        </div>
    </aside>
    <br>
    <br>
    <br>
    <br>

    <div class="d-grid gap-4 col-6 mx-auto">
        <a href="./altaproducto_m.php" class="btn btn-warning btn-lg  text-light" type="button">Ingresar Producto</a>
        <a href="./modificacionproducto_m.php" class="btn btn-warning btn-lg  text-light" type="button">Listado de productos</a>
    </div>












    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>