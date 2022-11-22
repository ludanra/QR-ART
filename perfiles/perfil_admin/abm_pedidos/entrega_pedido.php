<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];

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
  }
}

session_start();

$usuario= $_SESSION['usuario'];

if ($estado_ped=="Cancelado" || $estado_ped=="Entregado" || $estado_ped=="Pte de pago"){
  PRINT<<<HERE
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div class="alert alert-danger" role="alert">
  El pedido no puede marcarse como entregado de acuerdo a su estado actual
  </div>
  HERE;
  header("Refresh: 2; URL= pedidos.php");
}else{
  $estado_ped = "Entregado";
  $hoy = date("Y-m-d H:i:s");
  $entregar= "UPDATE pedidos SET estado_ped='$estado_ped', ult_act_ped='$hoy', usuario='$usuario' WHERE nro_pedido='$nro_pedido'";
  $resultado = mysqli_query($conexion, $entregar);
  if($resultado){
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-success" role="alert">
    Pedido marcado como entregado correctamente
    </div>
    HERE;
    header("Refresh: 2; URL= pedidos.php");
  }else{
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    El pedido no pudo marcarse como entregado. Pongase en contacto con el administrador
    </div>
    HERE;
    header("Refresh: 2; URL= pedidos.php");
  }
}
