<?php

include ("base_de_datos.php");

$nombre_prod = $_POST ['nombre_prod'];
$precio_prod = $_POST ['precio_prod'];
$categoria_prod = $_POST ['categoria_prod'];
$categ_extra = $_POST ['categ_extra'];
$detalle_prod = $_POST ['detalle_prod'];

///Ver como hacer con la foto del producto
///$foto_prod = $_POST ['foto_prod'];

$insertar = "INSERT INTO productos (nombre_prod, precio_prod, categoria_prod, categ_extra, detalle_prod) VALUES ('$nombre_prod', '$precio_prod', '$categoria_prod', '$categ_extra', '$detalle_prod')";

$resultado = mysqli_query($conexion, $insertar);
if($resultado){
    echo "<scrip>alert('Se ha registrado correctamente el producto')";
}else {

    echo "<scrip>alert('Error, el producto no se ha podido crear')";

}
