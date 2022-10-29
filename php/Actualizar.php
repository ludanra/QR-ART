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
    $est_baja_usu=$data['est_baja_usu'];
    






    

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
    <link rel="stylesheet " href="../assets/stylemodiu.css">
    <link rel="stylesheet " href="../assets/back.css">
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
            <li><a class="dropdown-item" href="../abm_productos/abm_productos.php">Administración De Productos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
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
      
      
      <h6 class="text-sm-center text-light">Modificación de usuario<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg></h6>
      
    </div>
  </div>
</nav>

 


    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="width: 28rem;">

                <div class="card-body">

                    <form action="procesar.php" method="post">


                      <label for="formFile " class="form-label text-light " ></label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="hidden" class="form-control"  id="id_usuario" name="id_usuario" value=<?php echo $id; ?>>


                        </div>

                        <h5 class="text-sm-center">Datos Del Usuario</h5>





                        <label for="formFile " class="form-label" >Usuario</label>

                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Usuario" id="usuario " name="usuario" value=<?php echo $usuario;?>  readonly>


                        </div>
                      
                        <label for="formFile" class="form-label ">Password</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="password" class="form-control" placeholder="Password" name="contrasena" id="contrasena"; readonly >
                        </div>
                    

                        <label for="formFile" class="form-label" name="cod_perfil" id="cod_perfil">Codigo del perfil </label>

                        <?php
 
                        $query_perfil = "SELECT * FROM perfiles ";
                        $result = mysqli_query($conexion, $query_perfil);
                        $perfil_result= mysqli_num_rows($result);


                       ?>



                        <select class="form-select form-select-sm" name="cod_perfil" id="cod_perfil"  aria-label="Default select example">

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
                          

                       
                        <label for="formFile" class="form-label " name="estado" id="estado">Estado </label>



                        <select class="form-select form-select-sm" name="est_baja_usu" id="est_baja_usu"  aria-label="Default select example">
                          <option value= <?php echo $est_baja_usu; ?>><?php echo $est_baja_usu; ?></option>
                          <option value="ACTIVO">ACTIVO</option>
                          <option value="INACTIVO">INACTIVO</option>
                       
                     


                        
                         
                          </select>
                      

                        <label for="formFile" class="form-label ">Nombre</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control text-dark" placeholder="Nombre" name="nombre_usu" id="nombre_usu" value=<?php echo $nombre_usu; ?> readonly>
                        </div>
                      
                        <label for="formFile" class="form-label ">Apellido</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>
                          

                            <input type="text" class="form-control" placeholder="Apellido" name="apellido_usu" id="apellido_usu" value=<?php echo $apellido_usu; ?> readonly>
                        </div>
                        <label for="formFile" class="form-label ">Email</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            
                           <input type="email" class="form-control" placeholder="Email" name="email_usu" id="email_usu" value=<?php echo $email_usu; ?> readonly>
                          <br>
                          
                        <div class="col text-center">
                        <button type="submit" class= "btn btn-primary" id="boton" name="boton" value=0>Actualizar</button>
                        <button type="submit" class= "btn btn-danger"id="boton" name="boton" value=1>Cancelar</button>
                    
                        </div>
                </form>

                <link rel="stylesheet" href="">

            </div>


            
    <footer class="py-1 mt-6 border-top bg-dark fixed-bottom">
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


    

</form>

</body>

</html>