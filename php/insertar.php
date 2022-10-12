<?php


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

    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    ERROR: El usuario o correo que intenta crear ya existe.
    </div>
    HERE;



   
}else{


    $insertar = "INSERT INTO usuarios (usuario, contrasena, cod_perfil, nombre_usu, apellido_usu, email_usu, est_baja_usu) VALUES ('$usuario', '$contrasena', '$cod_perfil', '$nombre', '$apellido', '$email', '$estado')";
    $resultado = mysqli_query($conexion, $insertar);

    if($resultado){

        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-success" role="alert">
        El usuario se creo correctamente.
        </div>
        HERE;

        header("Refresh: 3; URL=../perfiles/perfil_admin/abm_user/tablamodificacion.php");
        
    
    }else {
    
        PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            ERROR: El usuario no se pudo crear.
            </div>
            HERE;

            header("Refresh: 3; URL=../perfiles/perfil_admin/abm_user/formulario.php");

    
    }


}









