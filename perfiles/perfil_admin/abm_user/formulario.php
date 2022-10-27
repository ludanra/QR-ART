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

        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->

        <!--Custom styles-->
      
        <link rel="stylesheet" href="../../../assets/styleualt.css">
        <link rel="stylesheet" href="../../../assets/back.css">
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

                <a href="./tablamodificacion.php" class="nav-link active ">
                    <i class="nav-icon fas fa-tachometer-alt "></i>
                    <p>
                        Modificación De Usuario
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
                <a href="../abm_productos/abm_productos.php" class="nav-link active ">
                    <i class="nav-icon fas fa-tachometer-alt "></i>
                    <p>
                        Administración De Productos🍔

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


        <?php

$conexion=mysqli_connect("localhost","root","","qr_art");



?>



<div class="d-flex justify-content-center h-100">
    <div class="row mb-2">
        
    <div class="card" style="width: 28rem;">
 
                        
                        <div class="card-body">
                            
                            <h5 class="text-sm-center text-light" style="margin-bottom:1px">Alta de Usuario🙋🏻‍♂️</h5>
                            
                            
                            <form action="../../../php/insertar.php" method="post">
                                <label for="formFile" class="form-label">Usuario</label>
                                
                                <div class="input-group-sm form-group">
                                    <div class="input-group-prepend">
                                        
                                        </div>

                                        <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" autofocus required>
                                        
                                        
                                    </div>
                                    <label for="formFile" class="form-label" style="margin-bottom:1px">Password</label>
                                <div class="input-group-sm form-group">
                                    <div class="input-group-prepend">

                                        </div>
                                        
                                        <input type="password" class="form-control" placeholder="Password" name="contrasena" id="contrasena" autofocus required>
                                    </div>
                                    
                                    <label for="formFile" class="form-label" name="cod_perfil" id="cod_perfil" style="margin-bottom:1px">Perfil </label>
   
                                    
                                    <?php
 
 $query_perfil = "SELECT * FROM perfiles ";
                        $result = mysqli_query($conexion, $query_perfil);
                        $perfil_result= mysqli_num_rows($result);


                       ?>



                        <select class="form-select form-select-sm" name="cod_perfil" id="cod_perfil" aria-label="Default select example">
                         
                        <option value="xxx000">Seleccione Perfil</option>

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
                                 
                                    <label for="form-select form-select-sm" class="form-label" name="estado" id="estado">Estado </label>
                                    <select class="form-select form-select-sm" name="est_baja_usu" >

                                    <option value="ACTIVO">ACTIVO</option>
                                
                           
                            
                           
                          </select>
                                    
                                    <label for="formFile" class="form-label">Nombre</label>
                                    <div class="input-group-sm form-group">
                                        <div class="input-group-prepend-sm">

                                        </div>

                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre_usu" id="nombre_usu" autofocus required>
                                    </div>
                                    <label for="formFile" class="form-label">Apellido</label>
                                    <div class="input-group-sm form-group">
                                        <div class="input-group-prepend">

                                        </div>

                                        <input type="text" class="form-control" placeholder="Apellido" name="apellido_usu" id="apellido_usu" autofocus required>
                                    </div>
                                    <label for="formFile" class="form-label">Email</label>
                                    <div class="input-group-sm form-group">
                                        <div class="input-group-prepend-sm">

                                        </div>

                                        <input type="email" class="form-control" placeholder="Email" name="email_usu" id="email_usu" autofocus required>
                                    </div>
                                    <input type="submit" name="Registrar" value="Registrar" />
                        </div>
                        </form>

                        <link rel="stylesheet" href="/php/insertar.php">

                    </div>
                    </div>

                    <footer class="py-1 mt-5 border-top bg-dark fixed-bottom">
                        <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>

                    </footer>


                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>