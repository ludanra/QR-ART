<?php
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
$nro_pedido= $_GET['id'];

$query="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$sql="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nro_pedido = $data['nro_pedido'];
    $cod_mesa = $data['cod_mesa'];
    $fecha_pedido=$data['fecha_hora_ped'];
    $estado_ped=$data['estado_ped'];
    $notas_ped=$data['notas_ped'];
    $total_pedido=$data['total_pedido'];
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>QR-ART</title>
    <meta name="viewport" content="width-device-width">

    <link rel="stylesheet " href="../../../assets/reset.css">
    <link rel="stylesheet " href="../../../assets/stylealtap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/backp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-0">
            <div class="card" style="width: 28rem;">
             <h5 class="text-sm-center">Emitir pedido <?php echo $nro_pedido; ?>. Total: $<?php echo $total_pedido; ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
                </svg>
            </h5>

                <div class="card-body" >

                    <form action = emite_pedido_final.php method="post" enctype="multipart/form-data">
                    <!--form action="insertar_producto.php" method="post">-->
                        <label for="formFile" class="form-label"></label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="hidden" class="form-control"  id="nro_pedido" name="nro_pedido" value=<?php echo $nro_pedido; ?>>
                        </div>
                        <label for="formFile" class="form-label"></label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="hidden" class="form-control"  id="total_pedido" name="total_pedido" value=<?php echo $total_pedido; ?>>
                        </div>

                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="text" class="form-control" placeholder="Decinos tu nombre por favor" id="nombre_pedido" name="nombre_pedido" autofocus>


                        </div>
                        <label for="formFile" class="form-label">Decinos a que mesa llevamos tu pedido</label>
                        <div class="input-group-sm form-group">
                            <div class="input-group-prepend">

                            </div>

                            <input type="number" class="form-control" placeholder="Mesa" name="cod_mesa" id="cod_mesa" autofocus required>
                        </div>
                     

                        <div class="sm-3">
                            <label for="exampleFormControlTextarea1" class="form-label" name="notas_ped" id="notas_ped">Queres dejarnos algún comentario?</label>
                            <textarea class="form-control" name="notas_ped" id="notas_ped" rows="3"></textarea>
                        </div>
                        
                        <br>

                        <input type="submit" style="background-color:#2be01b" name="Registrar" id="Registrar" value="Enviar pedido"  class=sm/>
                </div>
                </form>

            </div>

            

        <footer class="py-1 sm-5 border-top bg-dark fixed-bottom">
            <p class="col-sm-15 mb-0 text-light text-center">QR-ARTⒸ2022</p>

        </footer>


</body>

</html>