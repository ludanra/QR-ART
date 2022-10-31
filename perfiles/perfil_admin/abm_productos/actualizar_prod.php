<?php
$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];
//Mostrar datos
//Si el id esta vacio que vuelva a la lista de productos
if(empty($_GET['id'])){
  header('location:../perfiles/perfil_admin/abm_user/tablamodificacion.php');
}
$query="SELECT * FROM productos WHERE cod_prod='$id'";
$sql="SELECT * FROM productos WHERE cod_prod='$id'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:modificacionproducto.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $cod_prod = $data['cod_prod'];
    $nombre_prod = $data['nombre_prod'];
    $precio_prod = $data['precio_prod'];
    $categoria_prod = $data['categoria_prod'];
    $detalle_prod = $data['detalle_prod'];
    $prod_disponible = $data['prod_disponible'];
    $foto_prod = $data['foto_prod'];
    $est_baja_prod = $data['est_baja_prod'];
    $categ_extra = $data['categ_extra'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/stylemodip.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <link rel="stylesheet " href="../../../assets/backp.css">
</head>
<body>
<nav class="navbar navbar-expand-xl">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../perfil_admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./altaproducto.php">Alta de Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./modificacionproducto.php">Listado de productos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accesos Rapidos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../abm_user/abm_usuarios.php">Administración De Usuarios<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg></a></li>
            <li><a class="dropdown-item" href="../abm_pedidos/abm_pedidos.php">Administración De Pedidos <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
</svg></a></li>
            <li><a class="dropdown-item" href="../abm_extras/abm_extras.php">Administración De Extras<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cup-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.11 3.187A.5.5 0 0 1 .5 3h13a.5.5 0 0 1 .488.608l-.22.991a3.001 3.001 0 0 1-1.3 5.854l-.132.59A2.5 2.5 0 0 1 9.896 13H4.104a2.5 2.5 0 0 1-2.44-1.958L.012 3.608a.5.5 0 0 1 .098-.42Zm12.574 6.288a2 2 0 0 0 .866-3.899l-.866 3.9Z"/>
</svg></a></li>
          </ul>
        </li>
        
        
      </ul>
      
      <h6 class="text-sm-center text-light">Listado de productos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
</svg></h6>
      
      
    </div>
  </div>
</nav>

<br>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card" style="width: 28rem;">
      
      <div class="card-body">
        <form  action = update_prod.php method="post" enctype="multipart/form-data">
                      <h3 class="text-sm-center">Datos del producto</h3>
                    <!--<form action="./../../php/procesar.php" method="post">-->


                      <label for="formFile " class="form-label text-light " ></label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="hidden" class="form-control"  id="cod_prod" name="cod_prod" value=<?php echo $cod_prod; ?>>
                        </div>

                        <label for="formFile " class="form-label text-dark ">Producto</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre_prod" name="nombre_prod" value="<?php echo $nombre_prod; ?>"  autofocus required>
                        </div>
                      

                        <label for="formFile" class="form-label text-dark">Precio: $</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="number" step="0.01" min="0" class="form-control" placeholder="Precio" name="precio_prod" id="precio_prod" value=<?php echo $precio_prod; ?> autofocus required>
                        </div>
                      

                        <label for="formFile" class="form-label text-dark" name="categoria_prod" id="categoria_prod" value=<?php echo $categoria_prod; ?>>Categoría del producto </label>
                        <select class="form-select" name="categoria_prod" id="categoria_prod"  aria-label="Default select example">
                            <option value= <?php echo $categoria_prod; ?>><?php echo $categoria_prod; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>

                        <label for="formFile " class="form-label text-dark " >Detalle del producto</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>

          

                            <textarea type="text" class="form-control" placeholder="Detalle del producto" rows="3" id="detalle_prod " name="detalle_prod" value="<?php echo $detalle_prod; ?>"  autofocus required><?php echo $detalle_prod; ?></textarea>

                        </div>

                        <label for="formFile" class="form-label text-dark" name="prod_disponible" id="prod_disponible" value=<?php echo $prod_disponible; ?>>Disponible </label>
                        <select class="form-select form-select-sm" name="prod_disponible" id="prod_disponible"  aria-label="Default select example">
                        <?php
                        //Este código de PHP es para definir que mostrar en el UPDATE
                        $showvalue= " ";
                        if ($prod_disponible == 0){
                          $showvalue = "NO";
                        }else {
                          $showvalue = "SI";
                        }
                        ?> 
                            <option value= <?php echo $prod_disponible; ?>><?php echo $showvalue; ?></option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                          </select>
                        
                        <label for="formFile" class="form-label text-dark" name="est_baja_prod" id="est_baja_prod" value=<?php echo $est_baja_prod; ?>>Estado </label>
                        <select class="form-select form-select-sm" name="est_baja_prod" id="est_baja_prod"  aria-label="Default select example">
                        <?php
                        //Este código de PHP es para definir que mostrar en el UPDATE
                        $showvalue= " ";
                        if ($est_baja_prod == 0){
                          $showvalue = "INACTIVO";
                        }else {
                          $showvalue = "ACTIVO";
                        }
                        ?>
                            <option value= <?php echo $est_baja_prod; ?>><?php echo $showvalue; ?></option>
                            <option value=1>ACTIVO</option>
                            <option value=0>INACTIVO</option>
                          </select>
                        

                        

                        <label for="formFile" class="form-label text-dark" name="categ_extra" id="categ_extra" value=<?php echo $categ_extra; ?>>Categoría extra: </label>
                        <select class="form-select form-select-sm" name="categ_extra" id="categ_extra"  aria-label="Default select example">
                            <option value=<?php echo $categ_extra; ?>><?php echo $categ_extra; ?></option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        <br>


                        <div class="sm-3">
                            <label for="formFile " class="form-label text-dark ">Imagen actual: </label>
                            <img style="border: 2px solid ; width: 150px" alt="" src="<?php echo "../../../imagenes/productos/".$foto_prod ?>">
                            <br>
                            <br>
                            <label for="formFile" class="form-label-sm" name="foto_prod" id="foto_prod">Foto del producto - Formato jpg - Max: 10mb</label>
                            <input class="form-control-sm" type="file" name="foto_prod" id="foto_prod" value=<?php echo $foto_prod; ?>>
                        </div>
                        <br>
                        <br>
                        <br>


                        <div class="col text-center">
                        <button type="submit" class= "btn btn-primary"  id="boton" name="boton" value="0">Actualizar </button>
                        <button type="submit" class= "btn btn-danger" id="boton" name="boton" value="1"> Cancelar </button>
                        </div>
                </div>
                </form>

                        

                <link rel="stylesheet" href="">

            </div>


            
    <footer class="py-2 mt-6 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>