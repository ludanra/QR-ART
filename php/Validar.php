<?php

$alert='';

if(!empty($_POST))

{
    if(empty($_POST['usuario']) || empty($_POST['contrasena']))
    
    {
        $alert = 'Por faavor ingres su usuario y password';


    }else{

        require_once "base_de_datos.php";

        $usuario = $_POST['usuario'];
        $contrasena =$_POST['contrasena'];
        $consulta= mysqli_query($db,"SELECT*FROM usuarios where usuario='$usuario' and contrasena='$contrasena'");
        $filas=mysqli_num_rows($consulta);

        if($filas > 0)
        {
            $data = mysqli_fetch_array($consulta);

            session_start();
            $_SESSION['active'] = true;
            $_SESSION['usuario']= $data[usuario];
            $_SESSION['cod_perfil']= $data[cod_perfil];
            $_SESSION['nombre_usu']= $data[nombre_usu];
            $_SESSION['apellido_usu']= $data[apellido_usu];
            $_SESSION['est_baja_usu']= $data[est_baja_usu];
            $_SESSION['email_usu']= $data[email_usu];
            $_SESSION['id_usuario']= $data[id_usuario];

            heard('location:');

            

        }else
        {
            $alert = 'Usuario o password incorrecto';

            session_destroy();
        }
    }


}





