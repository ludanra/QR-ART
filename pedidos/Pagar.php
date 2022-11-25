<?php


session_start();
$conexion=mysqli_connect("localhost","root","","qr_art");





//creamos referencia de pedido
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$nro_pedido= $password;





//insertamos el pedido

if(isset($_SESSION['carrito'])){
    $carrito_mio=$_SESSION['carrito'];
    // $_SESSION['carrito']=$carrito_mio;
    }


            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if(isset($carrito_mio[$i])){
                if($carrito_mio[$i]!=NULL){
        
                    $cantidad = $carrito_mio[$i]['cantidad'];
                    $nombre_prod= $carrito_mio[$i]['nombre_prod'];
                    $precio_prod = $carrito_mio[$i]['precio_prod'];
                    $total_precio = $precio_prod * $cantidad;
                 
                    
                    $query = "INSERT INTO pedidos_solicitados (nro_pedido,cantidad,nombre_prod,precio_prod,total)
                    VALUES ('$nro_pedido', '$cantidad', '$nombre_prod', '$precio_prod', '$total_precio')";
                    $conexion=mysqli_connect("localhost","root","","qr_art");
                    $result = mysqli_query($conexion, $query);

               
           
            }
            }
            }
            }


       
            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if(isset($carrito_mio[$i])){
            if($carrito_mio[$i]!=NULL){ 
            $total=$total + ($carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad']);
            }
            }}}
            if(!isset($total)){$total = '0';}else{ $total = $total;}
            //echo $total; 



            $nro_pedido = $nro_pedido;
            $estado_ped = 'Pte de pago';
            $forma_pago= 'Pendiente';
            $total_pedido = $total;
            
            
            $query = "INSERT INTO pedidos (nro_pedido,estado_ped,forma_pago,total_pedido)
            VALUES ('$nro_pedido', '$estado_ped', '$forma_pago', '$total_pedido')";
            $result = mysqli_query($conexion,$query);
            
            
            unset( $_SESSION["carrito"] );

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
            En unos momentos se acercarán a tomar el pago.</br>
            El total es <strong>$total_pedido</strong>
            </div>
            HERE;
            header("Refresh: 10; URL=../index.php");

    
          
            
            
            
            









?>



