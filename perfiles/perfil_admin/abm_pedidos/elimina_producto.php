<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];

if(empty($_GET['id'])){
  header('location:../perfiles/perfil_admin/abm_pedidos/pedidos.php');
}
$query="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id'";
$sql="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nro_pedido = $data['nro_pedido'];
    $total = $data['total'];
  }
}

$query2="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$sql2="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$result2=mysqli_query($conexion, $sql2);
$result_query2=mysqli_num_rows($result2);
if($result_query2 == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result2)) {
    $estado_ped = $data['estado_ped'];
    $nro_pedido = $data['nro_pedido'];
    $total_pedido = $data['total_pedido'];
  }
}

if($estado_ped=="Pte de pago"){
    $nuevo_total=$total_pedido-$total;
    $hoy = date("Y-m-d H:i:s");
    session_start();
    $usuario= $_SESSION['usuario'];
    $eliminar= "DELETE FROM pedidos_solicitados WHERE id_ped_sol='$id'";
    $resultado = mysqli_query($conexion, $eliminar);
    if($resultado){
        $act_total= "UPDATE pedidos SET total_pedido='$nuevo_total', ult_act_ped='$hoy', usuario='$usuario' WHERE nro_pedido='$nro_pedido'";
        $resultado2 = mysqli_query($conexion, $act_total);
        if($resultado2){
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-success" role="alert">
            Producto eliminado correctamente
            </div>
            HERE;
            header("Refresh: 2; URL= pedidos.php");
        }else{
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            El producto no pudo eliminarse
            </div>
            HERE;
            header("Refresh: 2; URL= pedidos.php");
        }

    }else{
        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-danger" role="alert">
        El producto no pudo eliminarse
        </div>
        HERE;
        header("Refresh: 2; URL= pedidos.php");
    }
}else{
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    No se puede eliminar un producto una vez que el pedido fue abonado
    </div>
    HERE;
    header("Refresh: 2; URL= pedidos.php");
}


