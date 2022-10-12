<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>QR-ART</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->

    <!--Custom styles-->
    <link rel="stylesheet " href="../../../assets/stylealtap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/OverlayScrollbars.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <nav>
        <h3 class="text-sm-center">Alta de producto 🍔</h3>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4 ">

        <!-- Sidebar -->
        <div class="sidebar ">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                <div class="info ">
                    <a class="d-block ">ADMINISTRADOR</a>
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
            <a href="./eliminarproducto.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Eliminar producto

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
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-body">
                <?php
                include("funciones.php");
                insertarprod();
                ?>

                    <form method="post" enctype="multipart/form-data">
                    <!--form action="insertar_producto.php" method="post">-->
                        <label for="formFile" class="form-label">Nombre del producto</label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre_prod" name="nombre_prod" autofocus required>


                        </div>
                        <label for="formFile" class="form-label">Precio</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="number" class="form-control" placeholder="Precio" name="precio_prod" id="precio_prod" autofocus required>
                        </div>

                        <label for="formFile" class="form-label" name="categoria_prod" id="categoria_prod">Categoría</label>
                        <select class="form-select" name="categoria_prod" id="categoria_prod" aria-label="Default select example">
                            <option value="1">Categoría 1</option>
                            <option value="2">Categoría 2</option>
                            <option value="3">Categoría 3</option>
                            <option value="4">Categoría 4</option>
                            <option value="5">Categoría 5</option>
                          </select>


                        <br>
                        <label for="formFile" class="form-label" name="categ_extra" id="categ_extra">Categoría Extras</label>
                        <select class="form-select" name="categ_extra" id="categ_extra" aria-label="Default select example">
                            <option value="1">Categoría extras 1</option>
                            <option value="2">Categoría extras 2</option>
                            <option value="3">Categoría extras 3</option>
                            <option value="4">Categoría extras 4</option>
                            <option value="5">Categoría extras 5</option>
                          </select>
                        <br>

                        <label for="formFile" class="form-label" name="prod_disponible" id="prod_disponible">Disponible</label>
                        <select class="form-select" name="prod_disponible" id="prod_disponible" aria-label="Default select example">
                            <option value="NO">NO</option>
                          </select>
                        <br>

                        <label for="formFile" class="form-label" name="est_baja_prod" id="est_baja_prod">Estado del producto</label>
                        <select class="form-select" name="est_baja_prod" id="est_baja_prod" aria-label="Default select example">
                            <option value="ACTIVO">ACTIVO</option>
                          </select>
                        <br>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" name="detalle_prod" id="detalle_prod">Detalle del producto</label>
                            <textarea class="form-control" name="detalle_prod" id="detalle_prod" rows="3"></textarea>

                        </div>
                        
                        <div class="mb-3">
                            <label for="formFile" class="form-label" name="foto_prod" id="foto_prod">Foto del producto - Formato jpg - Max: 10mb</label>
                            <input class="form-control" type="file" name="foto_prod" id="foto_prod">
                            <!--Acá tenemos que hablar con Alfaro a ver como hacemos para que se suba un archivo, 
                            el mismo se pase al servidor, y luego se le modifique el nombre para poder mostrarlo en el front-->
                        </div>

                        <input type="submit" name="Registrar" id="Registrar" value="Ingresar Producto" />
                </div>
                </form>

            </div>

</body>

</html>