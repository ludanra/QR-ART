<?php
$usuario  = "root";
$contrasena = "";
$servidor = "localhost";
$basededatos = "qr_art";
$conexion = mysqli_connect($servidor, $usuario, $contrasena) or die("No se podido conectar al Servidor");
$db = mysqli_select_db($conexion, $basededatos) or die(" Error!!!! en conectar a la Base de Datos");
?>
