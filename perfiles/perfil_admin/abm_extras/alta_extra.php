<?php

   session_start();

   $nombre = $_SESSION['nombre_usu'];
   $usuario= $_SESSION['usuario'];
   $apellido= $_SESSION['apellido_usu'];


?>


<!DOCTYPE html>
<html>

<head>
    <title>QR-ART</title>
    <!--Made with love by Mutiullah Samim -->


    <!--Fontawesome CDN-->

    <!--Custom styles-->
    <link rel="stylesheet " href="../../../assets/stylealtap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/backp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>


    <aside class="main-sidebar sidebar-dark-primary elevation-4 ">

        <!-- Sidebar -->
        <div class="sidebar ">
            <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
          
          <a class="d-block "><?php echo $usuario;?></a>
             </div>

            <a href="../perfil_admin.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Inicio
                    <i class="bi bi-house"></i>
                </p>
            </a>


            <a href="./modificacion_extra.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Modificacion de extras
                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>

            <a href="../abm_user/abm_usuarios.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Usuarios🙋🏻‍♂️
                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
            <a href="../abm_pedidos/abm_pedidos.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Pedidos🗒️

                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
            <a href="../abm_extras/abm_extras.php" class="nav-link active ">
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

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
             <h3 class="text-sm-center">Alta de extras 🍔</h3>

                <div class="card-body">
                <?php
                include("funciones.php");
                insertarextra();
                ?>

                    <form method="post" enctype="multipart/form-data">
                        <label for="formFile" class="form-label">Nombre del extra</label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre del extra" id="nombre_extra" name="nombre_extra" autofocus required>
                        </div>

                        <label for="formFile" class="form-label">Precio</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="number" class="form-control" placeholder="Precio" name="precio_extra" id="precio_extra" autofocus required>
                        </div>

                        <label for="formFile" class="form-label" name="categ_extra" id="categ_extra">Categoría</label>
                        <select class="form-select" name="categ_extra" id="categ_extra" aria-label="Default select example">
                            <option value="1">Categoría 1</option>
                            <option value="2">Categoría 2</option>
                            <option value="3">Categoría 3</option>
                            <option value="4">Categoría 4</option>
                            <option value="5">Categoría 5</option>
                          </select>


                        <label for="formFile" class="form-label" name="estado_extra" id="estado_extra">Disponible</label>
                        <select class="form-select" name="estado_extra" id="estado_extra" aria-label="Default select example">
                            <option value="0">INACTIVO</option>
                          </select>
                        <br>
                        
                        <div class="mb-3">
                            <label for="formFile" class="form-label" name="foto_extra" id="foto_extra">Foto del extra - Formato jpg - Max: 10mb</label>
                            <input class="form-control" type="file" name="foto_extra" id="foto_extra">
                            <!--Acá tenemos que hablar con Alfaro a ver como hacemos para que se suba un archivo, 
                            el mismo se pase al servidor, y luego se le modifique el nombre para poder mostrarlo en el front-->
                        </div>

                        <input type="submit" name="Registrar" id="Registrar" value="Ingresar Extra" />
                </div>
                </form>

            </div>

            

        <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>

        </footer>


</body>

</html>