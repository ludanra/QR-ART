<?php

$conexion=mysqli_connect("localhost","root","","qr_art");



if(isset($_POST['editar'])){

  $email_usu = mysqli_real_escape_string($conexion, $_POST['email_usu']);
  
  
  


  
  $consulta="SELECT email_usu FROM usuarios WHERE email_usu = '$email_usu'";
  $resultado = mysqli_query($conexion, $consulta);
  $count = mysqli_num_rows($resultado);


  if($count == 1){

    header('location:pass.php');
    


    

  



    




    
  


  }else{
    echo "Este correo no existe";
  }
  


  
  


}
?>




