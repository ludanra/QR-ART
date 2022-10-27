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
    <meta name="viewport" content="width-device-width">

    <link rel="stylesheet " href="../../../assets/reset.css">
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
            <div class="info ">
           <a href="# " class="d-block "><?php echo "Usuario: "; echo $usuario;?></a>
            <a href="# " class="d-block "><?php echo "Perfil: Administrador";?></a>
            
              
                
            </div>
        </div>


            <a href="../perfil_admin.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Inicio
                    <i class="bi bi-house"></i>
                </p>
            </a>


            <a href="./modificacionproducto.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Modificacion de producto
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


    <div class="container">
        <div class="d-flex justify-content-center h-0">
            <div class="card" style="width: 28rem;">
             <h5 class="text-sm-center">Alta de producto 🍔</h5>

                <div class="card-body" >
                <?php
                include("funciones.php");
                insertarprod();
                ?>

                    <form method="post" enctype="multipart/form-data">
                    <!--form action="insertar_producto.php" method="post">-->
                        <label for="formFile" class="form-label">Nombre del producto</label>

                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre_prod" name="nombre_prod" autofocus required>


                        </div>
                        <label for="formFile" class="form-label">Precio</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="number" class="form-control" placeholder="Precio" name="precio_prod" id="precio_prod" autofocus required>
                        </div>

                        <label for="formFile" class="form-label" name="categoria_prod" id="categoria_prod">Categoría</label>
                        <select class="form-select form-select-sm" name="categoria_prod" id="categoria_prod" aria-label="Default select example">
                            <option value="1">Categoría 1</option>
                            <option value="2">Categoría 2</option>
                            <option value="3">Categoría 3</option>
                            <option value="4">Categoría 4</option>
                            <option value="5">Categoría 5</option>
                          </select>

                        <label for="formFile" class="form-label" name="categ_extra" id="categ_extra">Categoría Extras</label>
                        <select class="form-select form-select-sm" name="categ_extra" id="categ_extra" aria-label="Default select example">
                            <option value="1">Categoría extras 1</option>
                            <option value="2">Categoría extras 2</option>
                            <option value="3">Categoría extras 3</option>
                            <option value="4">Categoría extras 4</option>
                            <option value="5">Categoría extras 5</option>
                          </select>
                   
                        <label for="formFile" class="form-label" name="prod_disponible" id="prod_disponible">Disponible</label>
                        <select class="form-select form-select-sm" name="prod_disponible" id="prod_disponible" aria-label="Default select example">
                            <option value="NO">NO</option>
                          </select>
                   

                        <label for="formFile" class="form-label" name="est_baja_prod" id="est_baja_prod">Estado del producto</label>
                        <select class="form-select form-select-sm" name="est_baja_prod" id="est_baja_prod" aria-label="Default select example">
                            <option value="ACTIVO">ACTIVO</option>
                          </select>
                     

                        <div class="sm-3">
                            <label for="exampleFormControlTextarea1" class="form-label" name="detalle_prod" id="detalle_prod">Detalle del producto</label>
                            <textarea class="form-control" name="detalle_prod" id="detalle_prod" rows="3"></textarea>

                        </div>
                        
                        <div class="sm-3">
                            <label for="formFile" class="form-label" name="foto_prod" id="foto_prod">Foto del producto - Formato jpg - Max: 10mb</label>
                            <input class="form-control-sm" type="file" name="foto_prod" id="foto_prod">
                            <!--Acá tenemos que hablar con Alfaro a ver como hacemos para que se suba un archivo, 
                            el mismo se pase al servidor, y luego se le modifique el nombre para poder mostrarlo en el front-->
                        </div>

                        <input type="submit" name="Registrar" id="Registrar" value="Ingresar Producto"  class=sm/>
                </div>
                </form>

            </div>

            

        <footer class="py-1 sm-5 border-top bg-dark fixed-bottom">
            <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>

        </footer>


</body>

</html>