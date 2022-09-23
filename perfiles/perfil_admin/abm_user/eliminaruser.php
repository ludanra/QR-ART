<?php

$conexion=mysqli_connect("localhost","root","","qr_art");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuario🙋🏻‍♂️</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../assets/OverlayScrollbars.min.css">
    
</head>

<body>
    <nav>
        <h3 class="text-sm-center">Eliminar Usuario🙋🏻⛔</h3>
    </nav>



    <table id="usuarios" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Contrasena</th>
                <th>Cod_perfil</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Estado</th>
                <th>Email</th>
                <th>ID</th>

            </tr>
        </thead>

        <?php
        $sql="SELECT * from usuarios";
        $result=mysqli_query($conexion, $sql);

        while($mostrar=mysqli_fetch_array($result)){
        ?>


        


        <tbody>
            <tr>
                <td><?php echo $mostrar['usuario'] ?></td>
                <td><?php echo $mostrar['contrasena'] ?></td>
                <td><?php echo $mostrar['cod_perfil'] ?></td>
                <td><?php echo $mostrar['nombre_usu'] ?></td>
                <td><?php echo $mostrar['apellido_usu'] ?></td>
                <td><?php echo $mostrar['est_baja_usu'] ?></td>
                <td><?php echo $mostrar['email_usu'] ?></td>
                <td><?php echo $mostrar['id_usuario'] ?></td>
            </tr>
           
        </tbody>
        <?php
        }
        ?>

    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });
    </script>



</body>

</html>