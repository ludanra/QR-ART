<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Formulario de Registro</title>

<input type="button" value="Abrir modal éxito" name="registrar" id="btnExito" class="registrar" tabindex="8" />
<input type="button" value="Abrir modal falla" name="registrar" id="btnFalla" class="registrar" tabindex="8" />

<div class="modal fade" id="modal_exito" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Usuario creado correctamente</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modal_falla" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Usuario ya existe</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php

include ("base_de_datos.php");

$(document).ready(function(){
    $(".registrar").click(function(e){
      if(e.target.id == 'btnRegistrar'){
        $("#modal-title").text("Usuario creado correctamente");
      }else{
        $("#modal-title").text("El correo ya existe");
      }
      $('#myModal').modal('show');
    });
});

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
        //Se valida si el nombre del producto ya existe
        echo "<script>$(function() { $('#modal_falla').modal('show'); });</script>";
    }else{
        $insertar = "INSERT INTO productos (nombre_prod, precio_prod, categoria_prod, categ_extra, detalle_prod, prod_disponible, est_baja_prod) VALUES ('$nombre_prod', '$precio_prod', '$categoria_prod', '$categ_extra', '$detalle_prod', '$prod_disponible', '$est_baja_prod')";
        $resultado = mysqli_query($conexion, $insertar);
        if($resultado){
            echo "<script>$(function() { $('#modal_exito').modal('show'); });</script>";
        }else {
            echo "<script>$(function() { $('#modal_falla').modal('show'); });</script>";
        }
    }

?>