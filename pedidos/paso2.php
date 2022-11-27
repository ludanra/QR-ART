<?php
$nro_pedido= $_GET['id'];

include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
$query="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$sql="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nro_pedido = $data['nro_pedido'];
    $cod_mesa = $data['cod_mesa'];
    $fecha_pedido=$data['fecha_hora_ped'];
    $estado_ped=$data['estado_ped'];
    $notas_ped=$data['notas_ped'];
    $total_pedido=$data['total_pedido'];
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
    <link rel="stylesheet " href="../../assets/adminlte.css">
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/table.css">
    <link rel="stylesheet " href="../../../assets/backpedi.css">
</head>

<body>

<nav class="navbar navbar-expand-sm">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link active text-light" aria-current="page" href="../perfil_admin.php">Inicio</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="./abm_pedidos.php">Administración de Pedidos</a>
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
            <li><a class="dropdown-item" href="../abm_productos/abm_productos.php">Administración De Productos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
</svg></a></li>
            <li><a class="dropdown-item" href="../abm_extras/abm_extras.php">Administración De Extras<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cup-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M.11 3.187A.5.5 0 0 1 .5 3h13a.5.5 0 0 1 .488.608l-.22.991a3.001 3.001 0 0 1-1.3 5.854l-.132.59A2.5 2.5 0 0 1 9.896 13H4.104a2.5 2.5 0 0 1-2.44-1.958L.012 3.608a.5.5 0 0 1 .098-.42Zm12.574 6.288a2 2 0 0 0 .866-3.899l-.866 3.9Z"/>
</svg></a></li>
          </ul>
        </li>
        
        
      </ul>
    
      <h6 class="text-sm-center text-light">Mis pedidos<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
</svg></h6>
      
    </div>
  </div>
</nav>
<br>

<div class="content-header ">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <h4 class="text-center text-dark">Detalles de pedido: <?php echo $nro_pedido ?> </h4>
                    <h4 class="text-center text-dark">Estado pedido: <?php echo $estado_ped ?> </h4>
                    <h4 class="text-center text-dark">Total pedido: $<?php echo $total_pedido ?> </h4>
                </div>
                <?php
                if ($estado_ped=="Pte de pago"){
                    ?>
                    <a class= 'btn btn-success' href="agrega_producto.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Agregar Producto</a >
                <?php
                }
                ?>

                <!-- /.col -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</div>
  

    <table id="pedidos_solicitados" name="pedidos_solicitados" class="table table-striped" style="width:100%">




    
        <thead>
            <tr>
                <th class="text-dark">ID_producto</th>
                <th class="text-dark">Producto</th>
                <th class="text-dark">Precio producto</th>
                <th class="text-dark">Extras</th>
                <th class="text-dark">Acciones</th>
                <th class="text-dark">Precio extras</th>
                <th class="text-dark">Total</th>
            </tr>
        </thead>

        <?php
        $control="";
        $sql="SELECT * from pedidos_solicitados WHERE nro_pedido='$nro_pedido' ORDER BY id_ped_sol ASC";
        $result=mysqli_query($conexion, $sql);
        $id=['nro_pedido'];

        while($mostrar=mysqli_fetch_array($result)){
          
        ?>
        <tbody>
          <tr>
            <td class="text-dark"><?php echo $mostrar['id_ped_sol'] ?></td>
            <td class="text-dark"><?php echo $mostrar['nombre_prod'] ?></td>
            <td class="text-dark">$<?php echo $mostrar['precio_prod'] ?></td>
            <td class="text-dark"><?php echo $mostrar['nom_ext'] ?>
            <td>
            <?php
            if ($mostrar['nom_ext']=="" || $mostrar['nom_ext']=="Sin extras"){
                ?>
                <a class= "btn-sm btn-primary" href="agrega_extras.php?id=<?php echo $mostrar['id_ped_sol']?>" class="table__item__link" >Agrega Extra</a>
                <?php
            }else{?>
                <a class= "btn-sm btn-primary" href="elimina_extra_pedido.php?id1=<?php echo $mostrar['id_ped_sol']?>&id2=<?php echo $total_pedido?>&id3=<?php echo $nro_pedido?>" class="table__item__link" >Elimina Extra</a>
                </td>
            <?php
            }
            ?>
            </td>
            <td class="text-dark">$<?php echo $mostrar['precio_extra'] ?></td>
            <td class="text-dark">$<?php echo $mostrar['total'] ?>
          </tr>
        </tbody>
        <?php
        }  
        ?>




<a class= "btn-sm btn-primary" href="emite_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Avanzar</a>


  
    </table>
    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
        <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>
    </footer>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#pedidos').DataTable();
        });
    </script>



</body>

</html>