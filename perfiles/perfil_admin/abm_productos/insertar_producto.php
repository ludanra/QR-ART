<?php

include ("base_de_datos.php");

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
    echo "El producto que desea cargar ya existe";
}else{
    $insertar = "INSERT INTO productos (nombre_prod, precio_prod, categoria_prod, categ_extra, detalle_prod, prod_disponible, est_baja_prod) VALUES ('$nombre_prod', '$precio_prod', '$categoria_prod', '$categ_extra', '$detalle_prod', '$prod_disponible', '$est_baja_prod')";
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado){
        echo "<scrip>alert('Se ha registrado correctamente el producto')";
    }else {
        echo "<scrip>alert('Error, el producto no se ha podido crear')";
    }
}