<?php

$conexion=mysqli_connect("localhost","root","","qr_art");

$id=$_POST['id'];
$usuario = $_POST ['usuario'];
$estado = $_POST ['est_baja_usu'];

//actualizar

$actualizar= "UPDATE usuarios SET est_baja_usu='$estado' WHERE id_usuario='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if($resultado){
    echo "<scrip>alert('Se ha modificado correctamente el usuario')";
}else {

    echo "<scrip>alert('Error, el usuario no se ha podido modificar')";

}


?>