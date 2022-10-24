<?php
function insertarextra(){

    include ("base_de_datos.php");
    if (isset($_POST['Registrar'])){

        // Para el archivo adjunto hacer un select para saber el maximo valor, y luego con eso +1 ya se tengo el nombre del .jpg --> img+cod_prod.jpg
            
        $categ_extra = $_POST ['categ_extra'];
        $nombre_extra = $_POST ['nombre_extra'];
        $precio_extra = $_POST ['precio_extra'];
        $foto_extra = $_FILES ['foto_extra']['name'];
        $estado_extra = $_POST ['estado_extra'];

        $tipo_archivo = $_FILES['foto_extra']['type'];
        $tamano_archivo = $_FILES['foto_extra']['size'];

        if (!(strpos($tipo_archivo, "jpeg") && ($tamano_archivo < 10000000))){

            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>
            </div>
            HERE;

        }else{



            $consulta = "SELECT * FROM extra WHERE nombre_extra='$nombre_extra'";
            $result = mysqli_query($conexion, $consulta);
            $query= mysqli_fetch_array($result);
            
            if ($query > 0){

                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-danger" role="alert">
                ERROR: El nombre del extra que desea cargar ya existe
                </div>
                HERE;


            }else{
                $insertar = "INSERT INTO extra (categ_extra, nombre_extra, precio_extra, foto_extra, estado_extra) VALUES ('$categ_extra', '$nombre_extra', '$precio_extra', '$foto_extra', '$estado_extra')";
                $resultado = mysqli_query($conexion, $insertar);
                if($resultado){
                    if(move_uploaded_file($_FILES['foto_extra']['tmp_name'], "../../../imagenes/extras/".$foto_extra)){
                        PRINT<<<HERE
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <div class="alert alert-success" role="alert">
                        Cargado correctamente
                        </div>
                        HERE;
                    }else{
                        PRINT<<<HERE
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <div class="alert alert-danger" role="alert">
                        Se registró el extra, pero la imagen no pudo guardarse correctamente
                        </div>
                        HERE;
                    }
                }else {
                    PRINT<<<HERE
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <div class="alert alert-danger" role="alert">
                    ERROR: No fue posible cargar el extra. Intente nuevamente
                    </div>
                    HERE;
                }
            }

        }


    }

    
}