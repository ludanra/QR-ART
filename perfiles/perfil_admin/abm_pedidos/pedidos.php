<?php

$conexion=mysqli_connect("localhost","root","","qr_art");
include ("base_de_datos.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');


?>
<?php
header("Refresh:5");
date('H:i:s Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="Datatables/datatables.min.css">
    <link rel="stylesheet " href="../../assets/adminlte.css">
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/table.css">
    <link rel="stylesheet " href="../../../assets/backpedi.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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

    
    

    



    <table id="pedidos" name="pedidos" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="text-light">Código de Pedido</th>
                <th class="text-light">Estado</th>
                <th class="text-light">Creacion</th>
                <th class="text-light">Utima actualización</th>
                <th class="text-light">Usuario Act</th>
                <th class="text-light">Mesa</th>
                <th class="text-light">Forma de pago</th>
                <th class="text-light">Código Pago</th>
                <th class="text-light">Total</th>
                <th class="text-light">Acciones</th>
            </tr>
        </thead>

        <?php
        $control="";
        $sql="SELECT * from pedidos WHERE estado_ped <> 'En proceso' ORDER BY fecha_hora_ped DESC";
        $result=mysqli_query($conexion, $sql);
        $id=['cod_pedido'];


        while($mostrar=mysqli_fetch_array($result)){
          if ($control != $mostrar['cod_pedido']){
          ?>
        <tbody>
          <tr>
            <td class="text-light"><?php echo $mostrar['nro_pedido'] ?></td>
            <td class="text-light"><?php echo $mostrar['estado_ped'] ?></td>
            <td class="text-light"><?php echo $mostrar['fecha_hora_ped'] ?></td>
            <td class="text-light"><?php echo $mostrar['ult_act_ped'] ?></td>
            <td class="text-light"><?php echo $mostrar['usuario'] ?></td>
            <td class="text-light"><?php echo $mostrar['cod_mesa'] ?></td>
            <td class="text-light"><?php echo $mostrar['forma_pago'] ?></td>
            <td class="text-light"><?php echo $mostrar['cod_pago_ped'] ?></td>
            <td class="text-light">$ <?php echo $mostrar['total_pedido'] ?></td>
            <td>
            <?php
              if($mostrar['estado_ped'] == "Pte de pago" || $mostrar['estado_ped'] == "En proceso"){
                ?>
                <a class= 'btn btn-danger' href="cancela_pedido.php?id=<?php echo $mostrar['nro_pedido']?>" class="table__item__link" >Cancelar Pedido</a>
                <a class= 'btn btn-primary' class="table__item__link" >Marcar Entregado</a>
                <a class= 'btn btn-light' href="tomar_pago.php?id=<?php echo $mostrar['nro_pedido']?>" class="table__item__link" >Tomar Pago</a>       
                <a class= 'btn btn-success' href="detalle_pedido.php?id=<?php echo $mostrar['nro_pedido']?>" class="table__item__link" >Mas</a>
                <?php
              }elseif($mostrar['estado_ped'] == "Abonado"){
                ?>
                <a class= 'btn btn-danger' class="table__item__link" >Cancelar Pedido</a>
                <a class= 'btn btn-primary' href="entrega_pedido.php?id=<?php echo $mostrar['nro_pedido']?>" class="table__item__link" >Marcar Entregado</a>
                <a class= 'btn btn-light' href="editar_pago.php?id=<?php echo $mostrar['nro_pedido']?>"class="table__item__link" >Editar Pago</a>       
                <a class= 'btn btn-success' href="detalle_pedido.php?id=<?php echo $mostrar['nro_pedido']?>" class="table__item__link" >Mas</a>
                <?php
              }else{
                ?>
                <a class= 'btn btn-danger' class="table__item__link" >Cancelar Pedido</a>
                <a class= 'btn btn-primary' class="table__item__link" >Marcar Entregado</a>
                <a class= 'btn btn-light' class="table__item__link" >Tomar Pago</a>       
                <a class= 'btn btn-success' href="detalle_pedido.php?id=<?php echo $mostrar['nro_pedido']?>" class="table__item__link" >Mas</a>
                <?php
              }
            ?>
            </td>
          </tr>
        </tbody>
        <?php
        }
        $control = $mostrar['cod_pedido'];
      }  
      ?>

        <tfoot>
            <tr>
                <th class="text-light">Código de Pedido</th>
                <th class="text-light">Estado</th>
                <th class="text-light">Creacion</th>
                <th class="text-light">Utima actualización</th>
                <th class="text-light">Usuario Act</th>
                <th class="text-light">Mesa</th>
                <th class="text-light">Forma de pago</th>
                <th class="text-light">Código Pago</th>
                <th class="text-light">Total</th>
                <th class="text-light">Acciones</th>
            </tr>
        </tfoot>
    </table>

    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>

    
    <script>
        $(document).ready(function() {
            $('#a').DataTable();
        });
    </script>



</body>

</html>