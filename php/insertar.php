<?php

$alert='';


include ("base_de_datos.php");

$usuario = $_POST ['usuario'];
$contrasena = md5($_POST ['contrasena']);
$cod_perfil = $_POST ['cod_perfil'];
$nombre = $_POST ['nombre_usu'];
$apellido = $_POST ['apellido_usu'];
$email = $_POST ['email_usu'];
$estado = $_POST ['est_baja_usu'];

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email_usu='$email'";
$result = mysqli_query($conexion, $consulta);
$query= mysqli_fetch_array($result);

if($query > 0 ){
    echo "El correo o el usuario ya existe";
}else{


    $insertar = "INSERT INTO usuarios (usuario, contrasena, cod_perfil, nombre_usu, apellido_usu, email_usu, est_baja_usu) VALUES ('$usuario', '$contrasena', '$cod_perfil', '$nombre', '$apellido', '$email', '$estado')";
    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){

       echo " El usuario se creo correctamente";
        
    
    }else {
    
        echo "Error, el usuario no se pudo crear";
    
    }


}








