<?php
function insertarprod(){

    include ("base_de_datos.php");
    if (isset($_POST['Registrar'])){

        // Para el archivo adjunto hacer un select para saber el maximo valor, y luego con eso +1 ya se tengo el nombre del .jpg --> img+cod_prod.jpg
            
        $nombre_prod = $_POST ['nombre_prod'];
        $precio_prod = $_POST ['precio_prod'];
        $categoria_prod = $_POST ['categoria_prod'];
        $categ_extra = $_POST ['categ_extra'];
        $detalle_prod = $_POST ['detalle_prod'];
        $prod_disponible = $_POST ['prod_disponible'];
        $est_baja_prod = $_POST ['est_baja_prod'];

        ///Ver como hacer con la foto del producto
        ///$foto_prod = $_POST ['foto_prod'];

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


        }else{
            
            $maxcod_prod = "SELECT * FROM productos MAX(cod_prod)";

            $insertar = "INSERT INTO productos (nombre_prod, precio_prod, categoria_prod, categ_extra, detalle_prod, prod_disponible, est_baja_prod) VALUES ('$nombre_prod', '$precio_prod', '$categoria_prod', '$categ_extra', '$detalle_prod', '$prod_disponible', '$est_baja_prod')";
            $resultado = mysqli_query($conexion, $insertar);
            if($resultado){
                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-success" role="alert">
                Cargado correctamente
                </div>
                HERE;
            }else {
                PRINT<<<HERE
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <div class="alert alert-danger" role="alert">
                ERROR:No fue posible cargar el producto. Intente nuevamente
                </div>
                HERE;
            }
        }


    }

    
}