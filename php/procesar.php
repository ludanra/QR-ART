<?php

$conexion=mysqli_connect("localhost","root","","qr_art");


$id=$_POST['id_usuario'];
$contrasena = md5($_POST ['contrasena']);
$usuario = $_POST ['usuario'];
$cod_perfil = $_POST ['cod_perfil'];
$nombre = $_POST ['nombre_usu'];
$apellido = $_POST ['apellido_usu'];
$email = $_POST ['email_usu'];
$estado = $_POST ['est_baja_usu'];


    $consulta = "SELECT * FROM usuarios WHERE (usuario='$usuario' AND id_usuario != '$id') OR (email_usu='$email' AND id_usuario != '$id')";
    $result = mysqli_query($conexion, $consulta);
    $query= mysqli_fetch_array($result);
    
    if($query > 0 ){
        echo "El correo o el usuario ya existe";
    }else{

      if(empty($_POST['contrasena']))
      {


        $actualizar= "UPDATE usuarios SET usuario='$usuario', cod_perfil='$cod_perfil', nombre_usu='$nombre', apellido_usu='$apellido', email_usu='$email', est_baja_usu='$estado' WHERE id_usuario='$id'";

        $resultado = mysqli_query($conexion, $actualizar);
         

      }else{

        $actualizar= "UPDATE usuarios SET usuario='$usuario', contrasena='$contrasena', cod_perfil='$cod_perfil', nombre_usu='$nombre', apellido_usu='$apellido', email_usu='$email', est_baja_usu='$estado' WHERE id_usuario='$id'";

        $resultado = mysqli_query($conexion, $actualizar);

         

      }

      if($resultado){
      echo "<scrip>alert('Se ha modificado correctamente el usuario')";
      }else{

       echo "<scrip>alert('Error, el usuario no se ha podido modificar')";

      }
    }

?>
