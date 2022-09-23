<?php

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","qr_art");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contrasena=$contrasena";
echo $consulta;
$resultado=mysqli_query($conexion,$consulta);


//$total=mysqli_num_rows($resultado);
//echo $total;

//if ($total >0){
  //echo "DATO EXISTENTE";
  


//}
//else{
  //echo "nO existe";

//}

//echo 

$filas=mysqli_fetch_array($resultado);



if($filas['cod_perfil']==1){//Administrador
    header("location:./../perfiles/perfil_admin/perfil_admin.php");

}elseif ($filas ['cod_perfil']==2){ //cocina
header("location:perfil_cocina.html");
}elseif($filas ['cod_perfil']==3){ //Mozo
header("location:perfil_mozo.html");
}elseif($filas ['cod_perfil']==4){ //Caja
    header("location:perfil_caja.html");


}
else{
    ?>
    <?php
    header("location:login.php");

  ?>
      <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
     </div>
      </div>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);