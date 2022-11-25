<?php
$id_ped_sol= $_GET['id'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");

$query="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id_ped_sol'";
$sql="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id_ped_sol'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
    echo "No se encuentra producto del pedido";
    /*header('location:pedidos.php');*/
    header("Refresh: 10; location:paso2.php?id=$nro_pedido");
}else{
  while($data=mysqli_fetch_array($result)) {
    $total = $data['total'];
    $nro_pedido = $data['nro_pedido'];
    $precio_extra = $data['precio_extra'];
  }
}

$query="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$sql="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
    echo "No se encuentra pedido";
    /*header('location:pedidos.php');*/
    header("Refresh: 10; location:paso2.php?id=$nro_pedido");

}else{
  while($data=mysqli_fetch_array($result)) {
    $total_pedido = $data['total_pedido'];
    $estado_ped = $data['estado_ped'];
  }
}
$total = $total-$precio_extra;
$total_pedido = $total_pedido - $precio_extra;
$nombre_extra = "";
$precio_extra= 0;

if($estado_ped == "Pte de pago" || "En proceso"){
  $act_extra= "UPDATE pedidos_solicitados SET nom_ext='$nombre_extra', precio_extra='$precio_extra', total='$total' WHERE id_ped_sol='$id_ped_sol'";
  $resultado = mysqli_query($conexion, $act_extra);
  if($resultado){
    $hoy = date("Y-m-d H:i:s");
    session_start();
    $usuario= $_SESSION['usuario'];
    $act_total= "UPDATE pedidos SET total_pedido='$total_pedido', ult_act_ped='$hoy', usuario='$usuario' WHERE nro_pedido='$nro_pedido'";
    $resultado2 = mysqli_query($conexion, $act_total);
    if($resultado2){
      PRINT<<<HERE
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


      <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
      </svg>
      <div>
      ¡El extra se eliminó correctamente!</br>
      </div>
      <br>
      HERE;
      ?>
      <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al pedido</a>
      <?php
    }
  }

}else{
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
    </svg>
    <div>
    ¡No es posible agregar un extra de acuerdo al estado del pedido!</br>
    </div>
    <br>
    HERE;
    ?>
    <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al pedido</a>
    <?php

}


