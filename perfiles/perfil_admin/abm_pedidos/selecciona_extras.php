<?php

$id_ped_sol= $_GET['id'];
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");

$query="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id_ped_sol'";
$sql="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id_ped_sol'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nombre_prod = $data['nombre_prod'];
    $nro_pedido = $data['nro_pedido'];
  }
}

$query="SELECT * FROM productos WHERE nombre_prod='$nombre_prod'";
$sql="SELECT * FROM productos WHERE nombre_prod='$nombre_prod'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php?id='.$nro_pedido);
}else{
  while($data=mysqli_fetch_array($result)) {
    $categ_extra = $data['categ_extra'];
  }
}
$query="SELECT * from extra WHERE categ_extra='$categ_extra' AND estado_extra='1'";
$sql="SELECT * from extra WHERE categ_extra='$categ_extra' AND estado_extra='1'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  PRINT<<<HERE
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
  </svg>
  <div>
  No existen extras disponibles para este producto</br>
  </div>
  HERE;
  ?>
  <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al pedido</a>
<?php
  
}else{
    while($data=mysqli_fetch_array($result)) {
      $categ_extra = $data['categ_extra'];
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
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/backp.css">
    <link rel="stylesheet " href="../../../assets/table.css">
</head>

<body>
<nav class="navbar navbar-expand-sm">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../perfil_admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="detalle_pedido.php?id=<?php echo $nro_pedido?>">Volver al pedido</a>
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
      
      <h6 class="text-sm-center text-light">Extras disponibles para el producto: <?php echo $nombre_prod ?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
</svg></h6>
      
    </div>
  </div>
</nav>


  <br>



  <table id="extra" name="extra" class="table table-striped" style="width:100%">
        <thead>
            <tr class="text-light">
                <th class="text-light">Nombre</th>
                <th class="text-light">Precio</th>
                <th class="text-light">Categoria</th>
                <th class="text-light">Nombre de la imagen</th>
                <th class="text-light">Foto</th>
                <th class="text-light">Estado</th>
                <th class="text-light">Editar</th>
            </tr>
        </thead>

        <?php
      
        $sql="SELECT * from extra WHERE categ_extra='$categ_extra' AND estado_extra='1' ORDER BY nombre_extra ASC";
        $result=mysqli_query($conexion, $sql);
        $id=['cod_extra'];

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tbody>
            <tr>
                <td class="text-light"><?php echo $mostrar['nombre_extra'] ?></td>
                <td class="text-light"><?php echo $mostrar['precio_extra'] ?></td>
                <td class="text-light"><?php echo $mostrar['categ_extra'] ?></td>
                <td class="text-light"><?php echo $mostrar['foto_extra'] ?></td>
                <td style="width: 10%;"><img id="image" name="image" style="border: 2px solid ; width: 100px; height: 60px;" alt="" src="<?php echo "../../../imagenes/extras/".$mostrar['foto_extra'] ?>"></td>
                <td class="text-light"><?php if($mostrar['estado_extra'] == 0){echo "INACTIVO";}else{echo "ACTIVO";} ?></td>
                <td>
                <a class= "btn-sm btn-primary" href="insert_extra.php?id1=<?php echo $mostrar['nombre_extra']?>&id2=<?php echo $id_ped_sol?>&id3=<?php echo $mostrar['precio_extra']?>" >Agregar a pedido</a>       
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


<footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>


</body>

</html>
<?php
}