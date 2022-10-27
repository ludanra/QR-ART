<?php

$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];



//Mostrar datos


//Si el id esta vacio que vuelva a la lista de usuarios

if(empty($_GET['id']))

{

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
          <a class="nav-link text-light" href="./eliminarproducto.php">Eliminar Producto</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accesos Rapidos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../abm_user/abm_usuarios.php">Administración De Usuarios🙋🏻‍♂️</a></li>
            <li><a class="dropdown-item" href="../abm_pedidos/abm_pedidos.php">Administración De Pedidos 🗒️</a></li>
            <li><a class="dropdown-item" href="../abm_extras/abm_extras.php">Administración De Extras🍟</a></li>
          </ul>
        </li>
        
        
      </ul>
      
      <h6 class="text-sm-center text-light">Listado de productos🍔</h6>
      
      
    </div>
  </div>
</nav>

<br>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card" style="width: 28rem;">
      
      <div class="card-body">
        
        <form  method="post">
                      <h5 class="text-sm-center">Datos del producto</h5>
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
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre_prod" name="nombre_prod" value=<?php echo $nombre_prod; ?>  autofocus required>
                        </div>
                      

                        <label for="formFile" class="form-label text-dark">Precio: $</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="number" step="0.01" min="0" class="form-control" placeholder="Precio" name="precio_prod" id="precio_prod" value=<?php echo $precio_prod; ?> autofocus required>
                        </div>
                      

                        <label for="formFile" class="form-label text-dark" name="categoria_prod" id="categoria_prod" value=<?php echo $categoria_prod; ?>>Categoría del producto </label>
                        <select class="form-select form-select-sm" name="categoria_prod" id="categoria_prod"  aria-label="Default select example">
                            <option value= <?php $categoria_prod; ?>><?php echo $categoria_prod; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        

                        

                        <label for="exampleFormControlTextarea1"class="form-label text-dark " >Detalle del producto</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" placeholder="Detalle del producto" id="detalle_prod " name="detalle_prod" value=<?php echo $detalle_prod; ?>  autofocus required>
                        </div>
                        <br>

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
                            <option value= <?php $prod_disponible; ?>><?php echo $showvalue; ?></option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                          </select>
                        <br>
                        
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
                            <option value= <?php $est_baja_prod; ?>><?php echo $showvalue; ?></option>
                            <option value=1>ACTIVO</option>
                            <option value=0>INACTIVO</option>
                          </select>
                        

                        

                        <label for="formFile" class="form-label text-dark" name="categ_extra" id="categ_extra" value=<?php echo $categ_extra; ?>>Categoría extra: </label>
                        <select class="form-select form-select-sm" name="categ_extra" id="categ_extra"  aria-label="Default select example">
                            <option value=<?php $categ_extra; ?>><?php echo $categ_extra; ?></option> 
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
                            <label for="formFile" class="form-label-sm" name="foto_prod" id="foto_prod">Foto del producto - Formato jpg - Max: 10mb</label>
                            <input class="form-control-sm" type="file" name="foto_prod" id="foto_prod" value=<?php echo $foto_prod; ?>>
                        </div>

                        <input type="submit" name="Actualizar" value="Actualizar" />
                </div>
                </form>

                <link rel="stylesheet" href="">

            </div>


            
    <footer class="py-2 mt-6 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>




   
<!--    </br>
<form class="container-table container-table--edit" action="./../php/procesar.php" method="post">
     div class="table__title table_title--edit">DATOS</div>
        <div class="table__hearder">Usuario</div>
        <div class="table__hearder">Cod_perfil</div>
        <div class="table__hearder">Nombre</div>
        <div class="table__hearder">Apellido</div>
        <div class="table__hearder">Estado</div>
        <div class="table__hearder">Email</div>
        <div class="table__hearder">Editar</div>   

    
        <?php

        
        
        
        $id=['id_usuario'];

        while($mostrar=mysqli_fetch_array($result)){
        ?>

            <tr>
                
                <input type="hidden" class="table__item" value="<?php echo $mostrar['id_usuario'];?>" name="id">
                <th>Usuario</th>
                <input type="text" class="table__item" value="<?php echo $mostrar['usuario'];?>" name="usuario">
                <th>Codigo de perfil</th>
                <input type="text" class="table__item" value="<?php echo $mostrar['cod_perfil'];?>" name="cod_perfil">
                <th>Nombre</th>
                <input type="text" class="table__item" value="<?php echo $mostrar['nombre_usu'];?>"  name="nombre_usu">
                <th>Apellido</th>
                <input type="text" class="table__item" value="<?php echo $mostrar['apellido_usu'] ?>"  name="apellido_usu">
                <br>
                <br>
                <th><select class="table___item" name='est_baja_usu' id='est_baja_usu'  aria-label="Default select example" required>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                            
                          </select></th>
                <th>Email</th>
                <input type="text" class="table__item" value="<?php echo $mostrar['email_usu'] ?>"  name="email_usu">
                <input class="btn btn-primary" type= "submit" value="actualizar" class="container__submit container__submit--actualizar">

 
            </tr>
           
        </tbody>
        <?php
        }
        ?>

    </table>
--> 
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    

</form>

</body>

</html>