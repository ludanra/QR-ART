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
                    Inicio <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25p%" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
                    <i class="bi bi-house"></i>
                </p>
            </a>


            <a href="./modificacionproducto.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Listado de Productos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
</svg>
                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
            <a href="../abm_user/abm_usuarios.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Usuarios<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
            <a href="../abm_pedidos/abm_pedidos.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Pedidos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
</svg>

                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
            <a href="../abm_extras/abm_extras.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Administración De Extras<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cup-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.11 3.187A.5.5 0 0 1 .5 3h13a.5.5 0 0 1 .488.608l-.22.991a3.001 3.001 0 0 1-1.3 5.854l-.132.59A2.5 2.5 0 0 1 9.896 13H4.104a2.5 2.5 0 0 1-2.44-1.958L.012 3.608a.5.5 0 0 1 .098-.42Zm12.574 6.288a2 2 0 0 0 .866-3.899l-.866 3.9Z"/>
</svg>
                    <i class="right fas fa-angle-left "></i>
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


    <div class="container">
        <div class="d-flex justify-content-center h-0">
            <div class="card" style="width: 28rem;">
             <h5 class="text-sm-center">Alta de producto <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
</svg></h5>

                <div class="card-body" >

                    <form action = insert_prod.php method="post" enctype="multipart/form-data">
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
                        <select class="form-select form-select-sm" name="categoria_prod" id="categoria_prod" aria-label="Default select example" required>
                            <option value="1" selected>Categoría 1</option>
                            <option value="2">Categoría 2</option>
                            <option value="3">Categoría 3</option>
                            <option value="4">Categoría 4</option>
                            <option value="5">Categoría 5</option>
                          </select>

                        <label for="formFile" class="form-label" name="categ_extra" id="categ_extra">Categoría Extras</label>
                        <select class="form-select form-select-sm" name="categ_extra" id="categ_extra" aria-label="Default select example" required>
                            <option value="1" selected>Categoría extras 1</option>
                            <option value="2">Categoría extras 2</option>
                            <option value="3">Categoría extras 3</option>
                            <option value="4">Categoría extras 4</option>
                            <option value="5">Categoría extras 5</option>
                          </select>
                   
                        <label for="formFile" class="form-label" name="prod_disponible" id="prod_disponible">Disponible</label>
                        <select class="form-select form-select-sm" name="prod_disponible" id="prod_disponible" aria-label="Default select example" required>
                            <option value="0" selected>NO</option>
                          </select>
                   

                        <label for="formFile" class="form-label" name="est_baja_prod" id="est_baja_prod">Estado del producto</label>
                        <select class="form-select form-select-sm" name="est_baja_prod" id="est_baja_prod" aria-label="Default select example" required>
                            <option value="1" selected>ACTIVO</option>
                          </select>
                     

                        <div class="sm-3">
                            <label for="exampleFormControlTextarea1" class="form-label" name="detalle_prod" id="detalle_prod">Detalle del producto</label>
                            <textarea class="form-control" name="detalle_prod" id="detalle_prod" rows="3" required></textarea>

                        </div>
                        
                        <div class="sm-3">
                            <label for="formFile" class="form-label" name="foto_prod" id="foto_prod">Foto del producto - Formato jpg - Max: 10mb</label>
                            <input class="form-control-sm" type="file" name="foto_prod" id="foto_prod" required>
                            <!--Acá tenemos que hablar con Alfaro a ver como hacemos para que se suba un archivo, 
                            el mismo se pase al servidor, y luego se le modifique el nombre para poder mostrarlo en el front-->
                        </div>

                        <input type="submit" style="background-color:#2be01b" name="Registrar" id="Registrar" value="Ingresar Producto"  class=sm/>
                </div>
                </form>

            </div>

            

        <footer class="py-1 sm-5 border-top bg-dark fixed-bottom">
            <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>

        </footer>


</body>

</html>