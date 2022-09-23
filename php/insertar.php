<?php

include ("base_de_datos.php");

$usuario = $_POST ['usuario'];
$contrasena = $_POST ['contrasena'];
$cod_perfil = $_POST ['cod_perfil'];
$nombre = $_POST ['nombre_usu'];
$apellido = $_POST ['apellido_usu'];
$email = $_POST ['email_usu'];
$estado = $_POST ['est_baja_usu'];


$insertar = "INSERT INTO usuarios (usuario, contrasena, cod_perfil, nombre_usu, apellido_usu, email_usu, est_baja_usu) VALUES ('$usuario', '$contrasena', '$cod_perfil', '$nombre', '$apellido', '$email', '$estado')";

$resultado = mysqli_query($conexion, $insertar);
if($resultado){
    echo "<scrip>alert('Se ha registrado correctamente el usuario')";
    microtime(5000000);
    header("location:./../perfiles/perfil_admin/abm_user/abm_usuarios.php");

}else {

    echo "<scrip>alert('Error, el usuario no se ha podido crear')";

}


