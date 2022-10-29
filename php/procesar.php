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
$boton=$_POST ['boton'];


if($boton==1){

  header("location:../perfiles/perfil_admin/abm_user/tablamodificacion.php");

}else{

$consulta = "SELECT * FROM usuarios WHERE (usuario='$usuario' AND id_usuario != '$id') OR (email_usu='$email' AND id_usuario != '$id')";
$result = mysqli_query($conexion, $consulta);
$query= mysqli_fetch_array($result);

if($query > 0 ){

  PRINT<<<HERE
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div class="alert alert-danger" role="alert">
  ERROR: El usuario o el correo que intenta modificar ya existe
  </div>
  HERE;
    
  
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


    PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-success" role="alert">
            El usuario se modifico correctamente.
            </div>
            HERE;

            header("Refresh: 3; URL=../perfiles/perfil_admin/abm_user/tablamodificacion.php");

  }else{



     PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-danger" role="alert">
        ERROR: El usuario no se ha podido modificar.
        </div>
        HERE;

  }
}




  
  

}



?>
