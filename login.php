<?php

$alert='';


if(!empty($_POST))

{
    if(empty($_POST['usuario']) || empty($_POST['contrasena']))
    
    {
        $alert = 'Por favor ingrese su usuario y password';


    }else{

        require_once "php/base_de_datos.php";

        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $contrasena = md5(mysqli_real_escape_string($conexion, $_POST['contrasena']));

        


        $consulta="SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas=mysqli_num_rows($resultado);

        if($filas > 0)  
        {
            $data = mysqli_fetch_array($resultado);

            session_start();
            $_SESSION['activo'] = true;
            $_SESSION['usuario']= $data['usuario'];
            $_SESSION['cod_perfil']= $data['cod_perfil'];
            $_SESSION['nombre_usu']= $data['nombre_usu']; 
            $_SESSION['apellido_usu']= $data['apellido_usu'];
            $_SESSION['est_baja_usu']= $data['est_baja_usu'];
            $_SESSION['email_usu']= $data['email_usu'];
            $_SESSION['id_usuario']= $data['id_usuario'];

            if($data['cod_perfil']==1){//Administrador
                header("location:./perfiles/perfil_admin/perfil_admin.php");
            
            }elseif ($data ['cod_perfil']==2){ //Mozo
            header("location:./perfiles/perfil_mozo/perfil_mozo.php");
            }elseif($data ['cod_perfil']==3){ //Caja
            header("location:perfil_mozo.html");
            }elseif($data ['cod_perfil']==4){ //Caja
                header("location:perfil_caja.html");
            
            
            }

            

        }else
        {
            $alert = 'Usuario o password incorrecto';

            
        }
    }


}
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>QR-ART</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles--> 
    <link rel="stylesheet" type="text/css" href="./assets/styleslogin.css">
   
    
    
    
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Inicio de Sesión</h3>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <input type="text" class="form-control" placeholder="Usuario" name="usuario">


                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

                            <input type="password" class="form-control" placeholder="Password" name="contrasena" >
                        </div>

                        

                        <div class="row align-items-center remember">
                            <input type="checkbox">Recordarme
                        </div>

                        <div  style="  font-weight: bold; color:#FF0000"  class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
 
                        <input type="submit" value="Ingresar">
                </div>
                </form>
                <link rel="stylesheet" href="">
            </div>  

</body>

</html>