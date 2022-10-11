<?php

$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];



//Mostrar datos


//Si el id esta vacio que vuelva a la lista de usuarios

if(empty($_GET['id']))

{

  header('location:../perfiles/perfil_admin/abm_user/tablamodificacion.php');

}


$sql="SELECT u.apellido_usu, u.email_usu, u.est_baja_usu, u.id_usuario, u.nombre_usu, u.usuario, (u.cod_perfil) as cod_perfil,(p.nombre_perfil) as nombre_perfil
      FROM usuarios u
      INNER JOIN perfiles p
      on u.cod_perfil = p.cod_perfil
      WHERE id_usuario = $id";

$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);


if($result_query == 0){

  header('location:../perfiles/perfil_admin/abm_user/tablamodificacion.php');

}else{


  $option = '';



  while($data=mysqli_fetch_array($result)) {

    $id = $data['id_usuario'];
    $usuario = $data['usuario'];
    $cod_perfil = $data['cod_perfil'];
    $nombre_perfil = $data['nombre_perfil'];
    $nombre_usu = $data['nombre_usu'];
    $apellido_usu = $data['apellido_usu'];
    $email_usu = $data['email_usu'];







    

    if($cod_perfil == 1){

      $option = '<option value="'.$cod_perfil.'" select>'.$nombre_perfil.'</option>';
    }else if($cod_perfil == 2){

      $option = '<option value="'.$cod_perfil.'"select>'.$nombre_perfil.'</option>';

    }else if($cod_perfil == 3){

      $option = '<option value="'.$cod_perfil.'"select>'.$nombre_perfil.'</option>';

    }




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
    <link rel="stylesheet " href="../assets/stylemodi.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../assets/stylesnav.css">
</head>

<body>

<nav class=" navbar navbar-expand-lg">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../perfiles/perfil_admin/perfil_admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../perfiles/perfil_admin/abm_user/formulario.php">Alta de usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../perfiles/perfil_admin/abm_user/tablamodificacion.php">Lista de usuarios</a>
        </li>
        <li class="nav-item dropdown text-light">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accesos Rapidos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../abm_productos/abm_productos.php">Administración De Productos🍔</a></li>
            <li><a class="dropdown-item" href="../abm_pedidos/abm_pedidos.php">Administración De Pedidos 🗒️</a></li>
            <li><a class="dropdown-item" href="../abm_extras/abm_extras.php">Administración De Extras🍟</a></li>
          </ul>
        </li>
        
        
      </ul>
      
      
      <h4 class="text-sm-center text-light">Modificación de usuario🙋🏻‍♂️</h4>
      
    </div>
  </div>
</nav>

    <nav>
        <h3 class="text-sm-center text-light">Datos del usuario</h3>
    </nav>


    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-body">

                    <form action="procesar.php" method="post">


                      <label for="formFile " class="form-label text-light " ></label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="hidden" class="form-control"  id="id_usuario" name="id_usuario" value=<?php echo $id; ?>>


                        </div>





                        <label for="formFile " class="form-label text-light " >Usuario</label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Usuario" id="usuario " name="usuario" value=<?php echo $usuario;?>  readonly>


                        </div>
                        <br>
                        <label for="formFile" class="form-label text-light">Password</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="password" class="form-control" placeholder="Password" name="contrasena" id="contrasena"; readonly >
                        </div>
                        <br>

                        <label for="formFile" class="form-label" name="cod_perfil" id="cod_perfil">Codigo del perfil </label>

                        <?php
 
                        $query_perfil = "SELECT * FROM perfiles ";
                        $result = mysqli_query($conexion, $query_perfil);
                        $perfil_result= mysqli_num_rows($result);


                       ?>



                        <select class="form-select" name="cod_perfil" id="cod_perfil"  aria-label="Default select example">

                        <?php

                        if($perfil_result > 0){

                          echo $option;

                            while($perfiles = mysqli_fetch_array($result) ){
                        ?>  
                        
                          <option value="<?php echo $perfiles["cod_perfil"]; ?>"><?php echo $perfiles["nombre_perfil"] ?></option>

                        <?php


                
                            }
    


                        }
                        
                        ?>



                        
                          </select>
                          

                          <br>
                        <label for="formFile" class="form-label text-light" name="estado" id="estado">Estado </label>


                         <?php
 
                        $query_estado = "SELECT DISTINCT est_baja_usu FROM usuarios ";
                        $resultado = mysqli_query($conexion, $query_estado);
                        $estado_result= mysqli_num_rows($resultado);


                       ?>

                        <select class="form-select" name="est_baja_usu" id="est_baja_usu"  aria-label="Default select example">
                          

                        <?php

                        if($estado_result > 0){

                         

                            while($estados = mysqli_fetch_array($resultado) ){
                        ?>  
                        
                          <option value="<?php echo $estados["est_baja_usu"]; ?>"><?php echo $estados["est_baja_usu"] ?></option>

                        <?php


                
                            }
    


                        }
                        
                        ?>
                            
                            
                           
                          </select>
                          <BR>

                        <label for="formFile" class="form-label text-dark">Nombre</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control text-dark" placeholder="Nombre" name="nombre_usu" id="nombre_usu" value=<?php echo $nombre_usu; ?> readonly>
                        </div>
                        <br>
                        <label for="formFile" class="form-label text-light">Apellido</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>
                            <br>

                            <input type="text" class="form-control" placeholder="Apellido" name="apellido_usu" id="apellido_usu" value=<?php echo $apellido_usu; ?> readonly>
                        </div>
                        <label for="formFile" class="form-label text-light">Email</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="email" class="form-control" placeholder="Email" name="email_usu" id="email_usu" value=<?php echo $email_usu; ?> readonly>
                        </div>
                        <input type="submit" name="Actualizar" value="Actualizar" />
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