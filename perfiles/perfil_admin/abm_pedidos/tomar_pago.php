<?php
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];
//Mostrar datos
//Si el id esta vacio que vuelva a la lista de productos
if(empty($_GET['id'])){
  header('location:../perfiles/perfil_admin/abm_pedidos/pedidos.php');
}
$query="SELECT * FROM pedidos WHERE nro_pedido='$id'";
$sql="SELECT * FROM pedidos WHERE nro_pedido='$id'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nro_pedido = $data['nro_pedido'];
    $estado_ped = $data['estado_ped'];
    $fecha_hora_ped = $data['fecha_hora_ped'];
    $ult_act_ped = $data['ult_act_ped'];
    $forma_pago = $data['forma_pago'];
    $cod_pago_ped = $data['cod_pago_ped'];
    $usuario_ult = $data['usuario'];
    $cod_mesa = $data['cod_mesa'];
    $total_pedido = $data['total_pedido'];
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
    <link rel="stylesheet " href="../../../assets/stylemodip.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <link rel="stylesheet " href="../../../assets/backp.css">
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

<br>

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card" style="width: 28rem; height: 41rem">
      
      <div class="card-body">
        <form  action = actualiza_pago.php method="post" enctype="multipart/form-data">
                      <h3 class="text-sm-center">Tomar Pago:</h3>
                    <!--<form action="./../../php/procesar.php" method="post">-->

                      <label for="formFile " class="form-label text-light " ></label>

                      <label for="formFile " class="form-label text-dark ">Código de Pedido</label>
                      <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control"  id="nro_pedido" name="nro_pedido" value=<?php echo $nro_pedido; ?> readonly>
                        </div>
                        <br>

                        <label for="formFile " class="form-label text-dark ">Mesa</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control"  id="cod_mesa" name="cod_mesa" value=<?php echo $cod_mesa; ?> readonly>
                        </div>
                        <br>

                        <label for="formFile " class="form-label text-dark ">Total: </label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control"  id="total_pedido" name="total_pedido" value=$<?php echo $total_pedido; ?> readonly>
                        </div>
                        <br>

                        <label for="formFile" class="form-label text-dark" name="forma_pago" id="forma_pago" value=<?php echo $forma_pago; ?>>Forma de pago </label>
                        <select class="form-select" name="forma_pago" id="forma_pago"  aria-label="Default select example">
                            <option value= <?php echo $forma_pago; ?>><?php echo $forma_pago; ?></option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Debito">Débito</option>
                            <option value="Credito">Crédito</option>
                        </select>
                        <br>


                        <label for="formFile " class="form-label text-dark ">Código de pago</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" placeholder="Código de pago" id="cod_pago_ped" name="cod_pago_ped" value="<?php echo $cod_pago_ped; ?>"  autofocus>
                        </div>
                        <br>
                      

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="hidden" class="form-control"  id="estado_ped" name="estado_ped" value="Abonado">
                        </div>

                        <br>

                        <div class="col text-center">
                        <button type="submit" class= "btn btn-primary"  id="boton" name="boton" value="0">Registrar pago </button>
                        </div>
                </div>
                </form>
                <a class= 'btn btn-success' href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al detalle del pedido</a >

                        

                <link rel="stylesheet" href="">

            </div>


            
    <footer class="py-2 mt-6 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>