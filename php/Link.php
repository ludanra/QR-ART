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

    






    header( "Location:http://localhost/QR-ART/php/pass.php?usuario=".$fila['usuario']."&token=".$token);
    

   
    


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



