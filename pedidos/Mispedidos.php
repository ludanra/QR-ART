<?php  session_start();

$conexion=mysqli_connect("localhost","root","","qr_art");




?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


 <link rel="stylesheet" href="../css/style_cp.css">


<title>Consulta basica</title>
</head>
<body>



<style>
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid;    /* width: 800px; */    grid-template-columns: 1fr 1fr ;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 30px;}
.blog-post img{    width: 100%;    height: 450px;    object-fit: cover;    border-radius: 10px;    }
.blog-post .category{    position: absolute;    top: 20px;    left: 20px;    padding: 10px 15px;  font-size: 14px;    text-decoration: none;    background-color: #e67e22;    color: #fff;    border-radius: 5px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);    text-transform: uppercase;}
.text-content{    position: absolute;    bottom: -30px;    padding: 20px;    background-color: #fff;    width: calc(100% - 20px);    left: 50%;    transform: translateX(-50%);    border-radius: 10px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{    font-size: 20px;    font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px;    width: 70px;    border: 5px solid rgba(0,0,0,0.1);    border-radius: 50%;    position: absolute;    top: -35px;    left: 35px;}
.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}
@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}
</style>


<!-- NAVBAR -->
<?php 

include("nav-cart.php");


?>












<div class="center mt-5">
        <div class="card pt-3" >
                <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Pedidos</p>
                <div class="container-fluid p-2">
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nro de pedido</th>
                                                <th scope="col">Fecha_ped</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Forma de Pago</th>
                                                <th scope="col">Notas</th>
                                        </tr>
                                </thead>
                                <tbody>
                                <?php
$busqueda=mysqli_query($conexion,"SELECT * FROM pedidos "); 
                                $numero = mysqli_num_rows($busqueda); ?>
                                        <h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
                                        <div class="container_card">
                                                <?php 
                                                $num = '0';
                                                while ($resultado = mysqli_fetch_assoc($busqueda)){
                                                $num++;
                                                ?>
                                                        
                                                        <tr onclick="location.href='Pedisolicitado.php?nro_pedido=<?php echo $resultado['nro_pedido']; ?>'" style="cursor: pointer;">
                                                        <td></td>
                                                        <td><?php echo $resultado["nro_pedido"]; ?></td>
                                                        <td><?php echo $resultado["fecha_hora_ped"]; ?></td>
                                                        <td > $ <?php echo $resultado["total_pedido"]; ?> </td>
                                                        <td><?php echo $resultado["estado_ped"]; ?></td>
                                                        <td><?php echo $resultado["forma_pago"]; ?></td>
                                                        <td><?php echo $resultado["notas_ped"]; ?></td>
                                                        </tr>    

                                                <?php } ?>
                                        </div>
                                </tbody>
                        </table>
                </div>
        </div>
</div>











<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>








