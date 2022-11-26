
<?php

session_start();

$conexion=mysqli_connect("localhost","root","","qr_art");


$id= $_REQUEST['id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- poppins Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/styles.css">

    

    <title>Menu de bar</title>

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


  <!-- importante -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




</head>

<body>




<!---navbar --->


<?php

include("nav-cart.php");
include("modal_cart2.php");


?>









<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Modificar mi pedido</p>
        <div class="container-fluid p-2">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Producto</th>
<th scope="col">Precio</th>
<th scope="col">Total</th>
<th scope="col">Borrar</th>


</tr>
</thead>
<tbody>
    




<div class="container_card">
 
 <?php
 if(isset($_SESSION['carrito'])){
 $total=0;
 for($i=0;$i<=count($carrito_mio)-1;$i ++){
 if(isset($carrito_mio[$i])){
 if($carrito_mio[$i]!=NULL){
 ?>
<?php if ($carrito_mio[$i]['cod_prod'] != 'portes'){ ?>
<tr>
<th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>


<td style="visibility:collapse; display:none;"><?php echo $carrito_mio[$i]['cantidad'] ?></td>
<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['nombre_prod'] ?></td>
<td style="vertical-align: middle;">$<?php echo $carrito_mio[$i]['precio_prod'] ?></td>
<td style="vertical-align: middle;"> $<?php echo $carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad']; ?></td>
<td style="vertical-align: middle;">
<form id="form3" name="form2" method="post" action="cart.php">
          <input name="id2" type="hidden" id="id2" value="<?php print $i;   ?>" />
          <button type="image" name="imageField3"class="btn-lg bg-danger text-white " style="border:0px;" data-toggle="tooltip" data-placement="top"
                title="Remove item"><i class="fas fa-trash-alt"></i> Borrar
              </button>
           
        </form>
</td>



</tr>    
<?php } ?>
<?php
		
                 $total=$total + ($carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad']);
                 }
                 }
                 }
                 }
                 ?>

</tbody>
</table>


<li class="list-group-item d-flex justify-content-between">
                 <span  style="text-align: left; color: #000000;"><strong>Total ($)</strong></span>
                 <strong  style="text-align: left; color: #000000;"><?php
                 if(isset($_SESSION['carrito'])){
                 $total=0;
                 for($i=0;$i<=count($carrito_mio)-1;$i ++){
                     if(isset($carrito_mio[$i])){
                 if($carrito_mio[$i]!=NULL){ 
                 $total=$total + ($carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad']);
                 }
                 }}}
                 if(!isset($total)){$total = '0';}else{ $total = $total;}
                 echo number_format($total, 2, ',', '.');  ?> </strong>
                 </li>









 </div>
</div>







<a type="button" class="btn btn-primary my-4"  href="../index.php">Volver</a>
<a type="button" class="btn btn-success my-4" href="Pagar.php?id=<?php echo $id ?>">Pagar</a>



</div>
</div>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>


