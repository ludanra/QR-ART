<?php
$conexion=mysqli_connect("localhost","root","","qr_art");

$sentencia = $conexion->query("SELECT pedidos.cod_pedido, pedidos.	estado_ped, pedidos.fecha_hora_ped	, ventas.id, GROUP_CONCAT(	productos.cod_prod  '..',  productos.nombre_prod, '..' AS pedidos FROM productos ");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


