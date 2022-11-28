<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comanda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">


    
</head>
<body>
<?php
include ("base_de_datos.php");
require('../../../fpdf/fpdf.php');
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

<div class="content-header ">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <h4 class="text-dark">Detalles de pedido: <?php echo $nro_pedido ?> </h4>
                    <h4 class="text-dark">Mesa: <?php echo $cod_mesa ?> </h4>
                    <h4 class="text-dark">Fecha pedido: <?php echo $fecha_pedido ?> </h4>
                    <h4 class="text-dark">Estado pedido: <?php echo $estado_ped ?> </h4>
                    <h4 class="text-dark">Total: $<?php echo $total_pedido ?> </h4>
                    <h4 class="text-dark">Notas: <?php echo $notas_ped ?> </h4>
                </div>
            </div>
        </div>
</div>

<table id="pedidos_solicitados" name="pedidos_solicitados" class="table table-striped" style="width:100%">


<thead>
    <tr>
        <th class="text-dark">ID_producto</th>
        <th class="text-dark">Producto</th>
        <th class="text-dark">Extras</th>
    </tr>
</thead>

<?php
$control="";
$sql="SELECT * from pedidos_solicitados WHERE nro_pedido='$nro_pedido' ORDER BY id_ped_sol ASC";
$result=mysqli_query($conexion, $sql);
$id=['nro_pedido'];

while($mostrar=mysqli_fetch_array($result)){
  
?>
<tbody>
  <tr>
    <td class="text-dark"><?php echo $mostrar['id_ped_sol'] ?></td>
    <td class="text-dark"><?php echo $mostrar['nombre_prod'] ?></td>
    <td class="text-dark"><?php echo $mostrar['nom_ext'] ?></td>
  </tr>
</tbody>
<?php
}  
?>
<body>
<?php
$html=ob_get_clean();
//echo $html;

require_once '../../../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();



$dompdf->loadHtml($html);
$dompdf-> setPaper('letter');
//$dompdf-> setPaper('A4','landscape');

$dompdf->render();
$dompdf-> stream("comanda_".$nro_pedido.".pdf", array("Attachment" =>false));


?>