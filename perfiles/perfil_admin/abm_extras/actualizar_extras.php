<?php

$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];



//Mostrar datos


//Si el id esta vacio que vuelva a la lista de usuarios

if(empty($_GET['id']))

{

  header('location:../perfiles/perfil_admin/abm_user/tablamodificacion.php');

}

$query="SELECT * FROM extra WHERE cod_extra='$id'";


$sql="SELECT * FROM extra WHERE cod_extra='$id'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);


if($result_query == 0){

  header('location:modificacion_extra.php');

}else{


  while($data=mysqli_fetch_array($result)) {

    $cod_extra = $data['cod_extra'];
    $nombre_extra = $data['nombre_extra'];
    $precio_extra = $data['precio_extra'];
    $categ_extra = $data['categ_extra'];
    $foto_extra = $data['foto_extra'];
    $estado_extra = $data['estado_extra'];
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
      
      <h4 class="text-sm-center text-light">Listado de Extras🍟</h4>
      
      
    </div>
  </div>
</nav>

<br>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      
      <div class="card-body">
        
      <form  action = update_extra.php method="post" enctype="multipart/form-data">
                      <h3 class="text-sm-center">Datos del extra</h3>
                    <!--<form action="./../../php/procesar.php" method="post">-->


                      <label for="formFile " class="form-label text-light " ></label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="hidden" class="form-control"  id="cod_extra" name="cod_extra" value=<?php echo $cod_extra; ?>>
                        </div>

                        <label for="formFile " class="form-label text-dark ">Producto</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre_extra" name="nombre_extra" value=<?php echo $nombre_extra; ?>  autofocus required>
                        </div>
                        <br>

                        <label for="formFile" class="form-label text-dark">Precio: $</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="number" step="0.01" min="0" class="form-control" placeholder="Precio" name="precio_extra" id="precio_extra" value=<?php echo $precio_extra; ?> autofocus required>
                        </div>
                        <br>

                        <label for="formFile" class="form-label text-dark" name="categ_extra" id="categ_extra" value=<?php echo $categ_extra; ?>>Categoría del extra </label>
                        <select class="form-select" name="categ_extra" id="categ_extra"  aria-label="Default select example">
                            <option value= <?php echo $categ_extra; ?>><?php echo $categ_extra; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        <br>

                        
                        <label for="formFile" class="form-label text-dark" name="estado_extra" id="estado_extra" value=<?php echo $estado_extra; ?>>Estado </label>
                        <select class="form-select" name="estado_extra" id="estado_extra"  aria-label="Default select example">
                        <?php
                        //Este código de PHP es para definir que mostrar en el UPDATE
                        $showvalue= " ";
                        if ($estado_extra == 0){
                          $showvalue = "INACTIVO";
                        }else {
                          $showvalue = "ACTIVO";
                        }
                        ?>
                            <option value= <?php echo $estado_extra; ?>><?php echo $showvalue; ?></option>
                            <option value="1">ACTIVO</option>
                            <option value="0">INACTIVO</option>
                          </select>
                        <br>

                        <div class="sm-3">
                            <label for="formFile " class="form-label text-dark ">Imagen actual: </label>
                            <img style="border: 2px solid ; width: 150px" alt="" src="<?php echo "../../../imagenes/extras/".$foto_extra ?>">
                            <br>
                            <label for="formFile" class="form-label" name="foto_extra" id="foto_extra">Foto del extra - Formato jpg - Max: 10mb</label>
                            <input class="form-control-sm" type="file" name="foto_extra" id="foto_extra" value=<?php echo $foto_extra; ?>>
                        </div>

                        <input type="submit" style="background-color:#2be01b" name="Actualizar" value="Actualizar" />
                        <input type="submit" style="background-color:#fa0505" name="Cancelar" value="Cancelar" />
                </div>
                </form>

                <link rel="stylesheet" href="">

            </div>


            
    <footer class="py-3 mt-6 border-top bg-dark fixed-bottom">
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