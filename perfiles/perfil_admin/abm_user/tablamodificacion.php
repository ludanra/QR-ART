<?php

$conexion=mysqli_connect("localhost","root","","qr_art");

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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
   
    <!-- overlayScrollbars -->
    
</head>

<body>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="../perfil_admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="./abm_usuarios.php">Alta de usuario</a>
        </li>
        <li class="nav-item dropdown text-dark">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accesos Rapidos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../abm_productos/abm_productos.php">Administración De Productos🍔</a></li>
            <li><a class="dropdown-item" href="../abm_pedidos/abm_pedidos.php">Administración De Pedidos 🗒️</a></li>
            <li><a class="dropdown-item" href="../abm_extras/abm_extras.php">Administración De Extras🍟</a></li>
          </ul>
        </li>
        
        
      </ul>
      
      
      <h4 class="text-sm-center text-dark">Modificación de usuario🙋🏻‍♂️</h4>
      
    </div>
  </div>
</nav>

<br>
<br>
   

    <table id="usuarios" name="usuarios" class="table table-striped" style="width:100%">
        <thead>
            <tr class="text-dark">
                <th class="text-dark">Usuario</th>
                <th class="text-dark">Cod_perfil</th>
                <th class="text-dark">Nombre</th>
                <th class="text-dark">Apellido</th>
                <th class="text-dark">Estado</th>
                <th class="text-dark">Email</th>
                <th class="text-dark">Editar</th>
            </tr>
        </thead>

        <?php

        $sql="SELECT * from usuarios";
        $result=mysqli_query($conexion, $sql);
        $id=['id_usuario'];

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tbody>
            <tr>
                <td class="text-dark" ><?php echo $mostrar['usuario'] ?></td>
                <td class="text-dark"><?php echo $mostrar['cod_perfil'] ?></td>
                <td class="text-dark"><?php echo $mostrar['nombre_usu'] ?></td>
                <td class="text-dark"><?php echo $mostrar['apellido_usu'] ?></td>
                <td class="text-dark"><?php echo $mostrar['est_baja_usu'] ?></td>
                <td class="text-dark"><?php echo $mostrar['email_usu'] ?></td>
                <td>
                <a class= "btn btn-primary" href="/QR-ART/php/Actualizar.php?id=<?php echo $mostrar['id_usuario']?>" class="table__item__link" >Editar</a>       
                </td>
                <td>
                <a class= "btn btn-primary" href="" class="table__item__link" >Activo</a>       
                </td>
             

 
            </tr>
           
        </tbody>
        <?php
        }
        ?>

    </table>

    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 

 
    



</body>

</html>

