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
            $estado_ped = 'Falta de pago';
            $forma_pago= 'Tarjeta bancaria';
            $total_pedido = $total;
            
            $query = "INSERT INTO pedidos (nro_pedido,estado_ped,forma_pago,total_pedido)
            VALUES ('$nro_pedido', '$estado_ped', '$forma_pago', '$total_pedido')";
            $result = mysqli_query($conexion,$query);
            
            
            unset( $_SESSION["carrito"] );



    
          
            
            header("Location: ../index.php");
            
            









?>



