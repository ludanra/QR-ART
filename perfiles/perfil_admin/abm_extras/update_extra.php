<?php
include ("base_de_datos.php");

if(isset($_POST['Cancelar'])){

    header("Refresh: 0; URL= modificacion_extra.php");

}else{

    $cod_extra = $_POST ['cod_extra'];
    $nombre_extra = $_POST ['nombre_extra'];
    $precio_extra = $_POST ['precio_extra'];
    $categ_extra = $_POST ['categ_extra'];
    $estado_extra = $_POST ['estado_extra'];
    $foto_extra = $_FILES['foto_extra']['name'];

    $tipo_archivo = $_FILES['foto_extra']['type'];
    $tamano_archivo = $_FILES['foto_extra']['size'];

    $consulta = "SELECT * FROM extra WHERE (cod_extra='$cod_extra')";
    $result = mysqli_query($conexion, $consulta);
    $query= mysqli_fetch_array($result);

    if($query == 0 ){

        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-danger" role="alert">
        ERROR: El extra que desea actualizar no existe
        </div>
        HERE;
        header("Refresh: 3; URL= modificacion_extra.php");

    }else{
        if($foto_extra != ""){
            if (!(strpos($tipo_archivo, "jpeg") && ($tamano_archivo < 10000000))){

                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-danger" role="alert">
                La extensión o el tamaño de los archivos no es correcta <br><br><table><tr><td><li> Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>
                </div>
                HERE;
                header("Refresh: 3; URL= modificacion_extra.php");

            }else{
                $actualizar= "UPDATE extra SET nombre_extra='$nombre_extra', precio_extra='$precio_extra', categ_extra='$categ_extra', estado_extra='$estado_extra', foto_extra='$foto_extra' WHERE cod_extra='$cod_extra'";
                $resultado = mysqli_query($conexion, $actualizar);
                if($resultado){
                    if(move_uploaded_file($_FILES['foto_prod']['tmp_name'], "../../../imagenes/productos/".$foto_extra)){
                        PRINT<<<HERE
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <div class="alert alert-success" role="alert">
                        Producto actualizado correctamente
                        </div>
                        HERE;
                        header("Refresh: 3; URL= modificacion_extra.php");
                    }else{
                        PRINT<<<HERE
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <div class="alert alert-danger" role="alert">
                        Se actualizó el producto, pero la imagen no pudo guardarse correctamente
                        </div>
                        HERE;
                        header("Refresh: 3; URL= modificacion_extra.php");
                    }
                }else{
                    PRINT<<<HERE
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <div class="alert alert-danger" role="alert">
                    ERROR:No fue posible actualizar el producto. Intente nuevamente
                    </div>
                    HERE;
                    header("Refresh: 3; URL= modificacion_extra.php");
                }
            }
        }else{
            $actualizar= "UPDATE extra SET nombre_extra='$nombre_extra', precio_extra='$precio_extra', categ_extra='$categ_extra', estado_extra='$estado_extra' WHERE cod_extra='$cod_extra'";
            $resultado = mysqli_query($conexion, $actualizar);
            if($resultado){
                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-success" role="alert">
                Producto actualizado correctamente
                </div>
                HERE;
                header("Refresh: 3; URL= modificacion_extra.php");
            }else{
                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-danger" role="alert">
                ERROR: No fue posible cargar el producto. Intente nuevamente
                </div>
                HERE;
                header("Refresh: 3; URL= modificacion_extra.php");
            }

        }
        
    }
}