<?php


$conexion=mysqli_connect("localhost","root","","qr_art");



if(isset($_POST['restablecer'])){

  $email_usu = mysqli_real_escape_string($conexion, $_POST['email_usu']);
  
  
  


  
  $consulta="SELECT usuario, email_usu FROM usuarios WHERE email_usu = '$email_usu'";

  $resultado = mysqli_query($conexion, $consulta);
  $fila=mysqli_fetch_array($resultado);
  $row= mysqli_num_rows($resultado);


  if($row == 1){

    $token = uniqid();

    
    $act ="UPDATE usuarios SET token= '$token' WHERE email_usu = '$email_usu'";
    $result = mysqli_query($conexion, $act);

    



   echo " Hola  " . $fila['usuario']. " haz click al siguiente link para restablecer tu contraseña.";

    echo("<br>");
    echo("<br>");
    echo("<br>");


    echo "http://localhost/QR-ART/php/pass.php?usuario=".$fila['usuario']."&token=".$token;
    

   
    


  }else{
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    ERROR: El correo que ingreso no se encuentra registrado, vuelva a intentarlo.
    </div>
    HERE;

    header("Refresh: 5; URL=recuperarclave.php");
  }
  


  

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../assets/backreset.css">
</head>
<body>
  <h1  class="font-weight-light text-light"> <?php echo " Hola  " . $fila['usuario']. " haz click en el boton para restablecer tu contraseña."; ?></h1>
  <a href="<?php echo "http://localhost/QR-ART/php/pass.php?usuario=".$fila['usuario']."&token=".$token;?>" class="btn btn-primary btn-lg"  role="button" aria-disabled="true">Restablecer</a>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


