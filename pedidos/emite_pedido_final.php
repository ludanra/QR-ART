<?php

include ("base_de_datos.php");

$nro_pedido = $_POST ['nro_pedido'];
$nombre_pedido = $_POST ['nombre_pedido'];
$id= $_POST['cod_mesa'];
$notas_ped = $_POST ['notas_ped'];
$total_pedido = $_POST ['total_pedido'];

$estado_ped = "Pte de pago";
$forma_pago = "Sin definir";




    $emite_pedido= "UPDATE pedidos SET nombre_pedido='$nombre_pedido', cod_mesa='$id', notas_ped='$notas_ped', estado_ped='$estado_ped', forma_pago='$forma_pago' WHERE nro_pedido='$nro_pedido'";
    $resultado = mysqli_query($conexion, $emite_pedido);
    if($resultado){
        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
        </svg>
        <div>
        ¡Su pedidos se proceso con éxito!</br>
        Su número de pedido es <strong>$nro_pedido</strong></br>    
        En unos momentos se acercarán a la mesa <strong>$id</strong> a tomar el pago.</br>
        El total es $ <strong>$total_pedido</strong>
        </div>
        HERE;
        ?>
    
       
        <?php
        
    }else{
        echo "No se pudo emitir el pedido";
    }

  ?>

        <a class= "btn-sm btn-primary" href="../index.php" >Hacer otro pedido</a>

