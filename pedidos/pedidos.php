<?php

$conexion=mysqli_connect("localhost","root","","qr_art");



$consulta = "SELECT * FROM productos";
$result = mysqli_query($conexion, $consulta);




while($fila=mysqli_fetch_array($result)){}





?>