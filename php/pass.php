<?php

$conexion=mysqli_connect("localhost","root","","qr_art");



if(isset($_GET['token']) AND isset($_GET['usuario'])){



    $usuario= mysqli_real_escape_string($conexion, $_GET['usuario']);
    $token= mysqli_real_escape_string($conexion, $_GET['token']);

    $sql= ("SELECT token FROM usuarios WHERE usuario= '$usuario' ");
    $resultado = mysqli_query($conexion, $sql);
    $row= mysqli_fetch_array($resultado);


    if($row['token']==$token){

    





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar password </title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/backreset.css">
</head>
<body>

<?php

$conexion=mysqli_connect("localhost","root","","qr_art");


if(isset($_POST['cambiar'])){

    

$contrasena= mysqli_real_escape_string($conexion, $_POST['contrasena']);


$contrasena=md5($contrasena);

$actualizar= "UPDATE usuarios SET contrasena = '$contrasena', token='' WHERE usuario = '$usuario'";
$resultado = mysqli_query($conexion, $actualizar);

if($actualizar){

    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-success" role="alert">
    Su contraseña se restablecio correctamente, ya puede ingresar.
    </div>
    HERE;
    header("Refresh: 5; URL=../login.php");

}else{

    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    ERROR: Su contraseña no se pudo restablecer.
    </div>
    HERE;
}


}



?>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            
                <form class="col-3" action="" method="POST">
                    <h2 class="text-light">Restablecer Password</h2>


                      <div class="mb-3">
                        <label for="c" class="form-label text-light">Nuevo Password</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena">
                    
                    </div>
            
                
                    <button type="submit" name="cambiar" class="btn btn-primary">Cambiar</button>
                </form>
            

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

<?php } } ?>

</html>