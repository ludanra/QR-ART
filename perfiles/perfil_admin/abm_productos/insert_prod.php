<?php

if(isset($_POST['Cancelar'])){

    header("Refresh: 0; URL= abm_productos.php");

}else{

    include ("base_de_datos.php");
    $nombre_prod = $_POST ['nombre_prod'];
    $precio_prod = $_POST ['precio_prod'];
    $categoria_prod = $_POST ['categoria_prod'];
    $categ_extra = $_POST ['categ_extra'];
    $detalle_prod = $_POST ['detalle_prod'];
    $prod_disponible = $_POST ['prod_disponible'];
    $est_baja_prod = $_POST ['est_baja_prod'];
    $foto_prod = $_FILES['foto_prod']['name'];

    $tipo_archivo = $_FILES['foto_prod']['type'];
    $tamano_archivo = $_FILES['foto_prod']['size'];

    if(($categ_extra == "") || ($nombre_prod == "") || ($precio_prod == "") || ($categoria_prod == "") || ($detalle_prod == "") || ($prod_disponible == "") || ($est_baja_prod == "") || ($foto_prod == "")){

        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-danger" role="alert">
        Recuerde completar todos los campos
        </div>
        HERE;
        header("Refresh: 3; URL= altaproducto.php");

    }else{

        if (!(strpos($tipo_archivo, "jpeg") && ($tamano_archivo < 10000000))){

            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>
            </div>
            HERE;
            header("Refresh: 3; URL= altaproducto.php");

        }else{

            $consulta = "SELECT * FROM productos WHERE nombre_prod='$nombre_prod'";
            $result = mysqli_query($conexion, $consulta);
            $query= mysqli_fetch_array($result);
            
            if ($query > 0){

                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-danger" role="alert">
                ERROR: El nombre del producto que desea cargar ya existe
                </div>
                HERE;
                header("Refresh: 3; URL= abm_productos.php");


            }else{

                $insertar = "INSERT INTO productos (nombre_prod, precio_prod, categoria_prod, categ_extra, detalle_prod, prod_disponible, est_baja_prod, foto_prod) VALUES ('$nombre_prod', '$precio_prod', '$categoria_prod', '$categ_extra', '$detalle_prod', '$prod_disponible', '$est_baja_prod', '$foto_prod')";
                $resultado = mysqli_query($conexion, $insertar);
                if($resultado){
                    if(move_uploaded_file($_FILES['foto_prod']['tmp_name'], "../../../imagenes/productos/".$foto_prod)){
                        PRINT<<<HERE
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <div class="alert alert-success" role="alert">
                        Cargado correctamente
                        </div>
                        HERE;
                        header("Refresh: 3; URL= abm_productos.php");
                    }else{
                        PRINT<<<HERE
                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <div class="alert alert-danger" role="alert">
                        Se registró el producto, pero la imagen no pudo guardarse correctamente
                        </div>
                        HERE;
                        header("Refresh: 3; URL= abm_productos.php");
                    }
                }else {
                    PRINT<<<HERE
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <div class="alert alert-danger" role="alert">
                    ERROR:No fue posible cargar el producto. Intente nuevamente
                    </div>
                    HERE;
                    header("Refresh: 3; URL= abm_productos.php");
                }
            }

        }
    }
        
}