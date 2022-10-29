<?php

$conexion=mysqli_connect("localhost","root","","qr_art");


$consulta = "SELECT * FROM productos WHERE categoria_prod= 4";
$result = mysqli_query($conexion, $consulta);




 while($fila=mysqli_fetch_array($result)){


    ?>

 

    <div>


    <img id="image" name="image" style="border: 2px solid ; width: 150px;" alt="" src="<?php echo "imagenes/productos/".$fila['foto_prod'] ?>">
    
    <div class="card-body">
    <h4><?php echo $fila['nombre_prod'];?></h4>
    </div>

    <div class="justify-content-end p-3">
    <h4><?php echo $fila['precio_prod'];?></h4>
    <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
    </div>


    </div>


 <?php

 } 




 ?>
   