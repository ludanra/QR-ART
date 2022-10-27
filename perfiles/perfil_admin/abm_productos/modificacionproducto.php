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
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/backp.css">
    <link rel="stylesheet " href="../../../assets/table.css">
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





  <table id="productos" name="productos" class="table table-striped" style="width:100%">
        <thead>
            <tr class="text-light">
                <th class="text-light">Nombre</th>
                <th class="text-light">Precio</th>
                <th class="text-light">Categoria</th>
                <th class="text-light">Detalle</th>
                <th class="text-light">Disponible</th>
                <th class="text-light">Foto</th>
                <th class="text-light">Estado</th>
                <th class="text-light">Categoria de Extra</th>
                <th class="text-light">Editar</th>
            </tr>
        </thead>

        <?php
      
        $sql="SELECT * from productos";
        $result=mysqli_query($conexion, $sql);
        $id=['cod_prod'];

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tbody>
            <tr>
                <td class="text-light"><?php echo $mostrar['nombre_prod'] ?></td>
                <td class="text-light"><?php echo $mostrar['precio_prod'] ?></td>
                <td class="text-light"><?php echo $mostrar['categoria_prod'] ?></td>
                <td class="text-light"><?php echo $mostrar['detalle_prod'] ?></td>
                <td class="text-light"><?php if($mostrar['prod_disponible'] == 0){echo "NO";}else{echo "SI";} ?></td>
                <td style="width: 10%;"><img id="image" name="image" style="border: 2px solid ; width: 100px;" alt="" src="<?php echo "../../../imagenes/productos/".$mostrar['foto_prod'] ?>"></td>
                <td class="text-light"><?php if($mostrar['est_baja_prod'] == 0){echo "INACTIVO";}else{echo "ACTIVO";} ?></td>
                <td class="text-light"><?php echo $mostrar['categ_extra'] ?></td>
                <td>
                <a class= "btn-sm btn-primary" href="actualizar_prod.php?id=<?php echo $mostrar['cod_prod']?>" class="table__item__link" >Editar</a>       
                </td>

 
            </tr>
        </tbody>
        <?php
        }
        ?>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


<footer class="py-1 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>


</body>

</html>