


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
    <link rel="stylesheet" href="../../../assets/styleualt.css">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/adminlte.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    


    <aside class="main-sidebar sidebar-dark-secondary elevation-4 ">

        <!-- Sidebar -->
        <div class="sidebar ">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-6 pb-6 mb-6 d-flex ">
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


            <a href="./tablamodificacion.php" class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Modificacion de usuario
                    <i class="right fas fa-angle-left "></i>
                </p>
            </a>
        
            <a href="../../../login.php" class="nav-link active ">
                <i class="far fa-circle nav-icon "></i>
                <p>Cerrar Sesión</p>
            </a>


        </div>
    </aside>
<<<<<<< HEAD
    <br>
    <br>
=======
    <?php

$conexion=mysqli_connect("localhost","root","","qr_art");



?>
>>>>>>> 412a5dee51432aa65842cadda7c7a0c480002cdc

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-body">

                 <h3 class="text-sm-center">Alta de usuario🙋🏻‍♂️</h3>


                    <form action="../../../php/insertar.php" method="post">
                        <label for="formFile" class="form-label">Usuario</label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" autofocus required>


                        </div>
                        <label for="formFile" class="form-label">Password</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="password" class="form-control" placeholder="Password" name="contrasena" id="contrasena" autofocus required>
                        </div>

                        <label for="formFile" class="form-label" name="cod_perfil" id="cod_perfil">Codigo del perfil </label>

                        <?php
 
                        $query_perfil = "SELECT * FROM perfiles ";
                        $result = mysqli_query($conexion, $query_perfil);
                        $perfil_result= mysqli_num_rows($result);


                       ?>



                        <select class="form-select" name="cod_perfil" id="cod_perfil"  aria-label="Default select example">

                        <?php

                        if($perfil_result > 0){

                            while($perfiles = mysqli_fetch_array($result) ){
                        ?>  
                        
                          <option value="<?php echo $perfiles["cod_perfil"]; ?>"><?php echo $perfiles["nombre_perfil"] ?></option>

                        <?php


                
                            }
    


                        }
                        
                        ?>



                        
                          </select>
                        <br>
                        <label for="formFile" class="form-label" name="estado" id="estado">Estado </label>
                        <select class="form-select" name="est_baja_usu" id="est_baja_usu"  aria-label="Default select example">
                            <option value="ACTIVO">ACTIVO</option>
                           
                            
                           
                          </select>
                          <BR>
                        <label for="formFile" class="form-label">Nombre</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Nombre" name="nombre_usu" id="nombre_usu" autofocus required>
                        </div>
                        <label for="formFile" class="form-label">Apellido</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Apellido" name="apellido_usu" id="apellido_usu" autofocus required>
                        </div>
                        <label for="formFile" class="form-label">Email</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="email" class="form-control" placeholder="Email" name="email_usu" id="email_usu" autofocus required>
                        </div>
                        <input type="submit" name="Registrar" value="Registrar" />
                </div>
                </form>

                <link rel="stylesheet" href="/php/insertar.php">

            </div>

            <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
                <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>
    
            </footer>


          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

