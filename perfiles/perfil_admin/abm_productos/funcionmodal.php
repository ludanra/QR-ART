<?php
function saludo(){
    include("base_de_datos.php");
    if(isset($_POST['carga'])) {
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);

        

        $consulta = "INSERT INTO datos(nombre, apellido) VALUES ('$nombre','$apellido')";
        $resultado2 = mysqli_query($conexion, $consulta);
        echo "CARGA EXITOSA";
    }
   
}     

    ?>