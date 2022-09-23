<?php

$conexion=mysqli_connect("localhost","root","","qr_art");

$id=$_POST['id'];
$usuario = $_POST ['usuario'];
$cod_perfil = $_POST ['cod_perfil'];
$nombre = $_POST ['nombre_usu'];
$apellido = $_POST ['apellido_usu'];
$email = $_POST ['email_usu'];
$estado = $_POST ['est_baja_usu'];


//actualizar

$actualizar= "UPDATE usuarios SET usuario='$usuario', cod_perfil='$cod_perfil', nombre_usu='$nombre', apellido_usu='$apellido', email_usu='$email', est_baja_usu='$estado' WHERE id_usuario='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if($resultado){
    echo "<scrip>alert('Se ha modificado correctamente el usuario')";
}else {

    echo "<scrip>alert('Error, el usuario no se ha podido modificar')";

}


?>
