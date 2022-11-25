<?php
include ("base_de_datos.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$boton=$_POST ['boton'];
if($boton==1){
    header("Refresh: 0; URL= pedidos.php");
}else{
    $nro_pedido = $_POST ['nro_pedido'];
    $query="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
    $sql="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
    $result=mysqli_query($conexion, $sql);
    $result_query=mysqli_num_rows($result);
    if($result_query == 0){
        header('location:pedidos.php');
      }else{
        while($data=mysqli_fetch_array($result)) {
          $estado_ped = $data['estado_ped'];
        }
    }

    if ($estado_ped=="Cancelado" || $estado_ped=="Entregado" || $estado_ped=="Abonado"){
        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-danger" role="alert">
        No puede registrarse un pago sobre este pedido de acuerdo a su estado actual
        </div>
        HERE;
        header("Refresh: 2; URL= pedidos.php");
    }else{
        $forma_pago = $_POST ['forma_pago'];
        $cod_pago_ped = $_POST ['cod_pago_ped'];
        $estado_ped = $_POST ['estado_ped'];
        session_start();
        $usuario= $_SESSION['usuario'];
        $hoy = date("Y-m-d H:i:s");
        if($cod_pago_ped==""){
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            El código de pago no puede quedar en blanco. Reintente
            </div>
            HERE;
            ?>
            <a class= "btn-sm btn-primary" href="tomar_pago.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al pedido</a>
            <?php
        }
        $abonar= "UPDATE pedidos SET estado_ped='$estado_ped', ult_act_ped='$hoy', usuario='$usuario', forma_pago='$forma_pago', cod_pago_ped='$cod_pago_ped' WHERE nro_pedido='$nro_pedido'";
        $resultado = mysqli_query($conexion, $abonar);
        if($resultado){
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-success" role="alert">
            Pago registrado correctamente
            </div>
            HERE;
            ?>
            <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al pedido</a>
            <?php
        }else{
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            El pago no pudo registrarse
            </div>
            HERE;
            ?>
            <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Volver al pedido</a>
            <?php

        }

    }


}