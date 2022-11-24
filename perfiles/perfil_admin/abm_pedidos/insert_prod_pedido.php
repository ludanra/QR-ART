<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
include ("base_de_datos.php");

$conexion=mysqli_connect("localhost","root","","qr_art");
$cod_prod= $_GET['id1'];
$nro_pedido= $_GET['id2'];


$query="SELECT * FROM pedidos_solicitados WHERE nro_pedido='$nro_pedido'";
$sql="SELECT * FROM pedidos_solicitados WHERE nro_pedido='$nro_pedido'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $fecha_ped = $data['fecha_ped'];
  }
}

$query="SELECT * FROM productos WHERE cod_prod='$cod_prod'";
$sql="SELECT * FROM productos WHERE cod_prod='$cod_prod'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nombre_prod = $data['nombre_prod'];
    $precio_prod = $data['precio_prod'];
    $total = $data['precio_prod'];
  }
}

$query="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$sql="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $total_pedido = $data['total_pedido'];
    $estado_ped = $data['estado_ped'];
    $cod_mesa = $data['cod_mesa'];
    $fecha_pedido=$data['fecha_hora_ped'];
    $notas_ped = $data['notas_ped'];
    
  }
}

$cantidad = 1;
$nom_extra = "";
$precio_extra = 0;

if($estado_ped=="Pte de pago"){
    $agregar= "INSERT INTO pedidos_solicitados (nro_pedido, cantidad, nombre_prod, precio_prod, total) VALUES ('$nro_pedido', '$cantidad', '$nombre_prod', '$precio_prod', '$total')";
    $resultado = mysqli_query($conexion, $agregar);
    if($agregar){
        $nuevo_total=$total_pedido+$total;
        $hoy = date("Y-m-d H:i:s");
        session_start();
        $usuario= $_SESSION['usuario'];
        $act_total= "UPDATE pedidos SET total_pedido='$nuevo_total', ult_act_ped='$hoy', usuario='$usuario' WHERE nro_pedido='$nro_pedido'";
        $resultado2 = mysqli_query($conexion, $act_total);
        if($resultado2){
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-success" role="alert">
            Producto agregado correctamente
            </div>
            HERE;
            ?>
            <div class="col-sm-12">
                <h4 class="text-center text-dark">Detalles de pedido: <?php echo $nro_pedido ?> </h4>
                <h4 class="text-center text-dark">Mesa: <?php echo $cod_mesa ?> </h4>
                <h4 class="text-center text-dark">Fecha pedido: <?php echo $fecha_pedido ?> </h4>
                <h4 class="text-center text-dark">Estado pedido: <?php echo $estado_ped ?> </h4>
                <h4 class="text-center text-dark">Total: $<?php echo $nuevo_total ?> </h4>
                <h4 class="text-center text-dark">Notas: <?php echo $notas_ped ?> </h4>
                <a class= "btn-sm btn-primary" href="agrega_producto.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Agregar mas productos al pedido</a>
                <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Ir al detalle del pedido</a>
                <br>
                <br>
            </div>
            <table id="pedidos_solicitados" name="pedidos_solicitados" class="table table-striped" style="width:100%">


              <thead>
                  <tr>
                      <th class="text-dark">ID_producto</th>
                      <th class="text-dark">Cantidad</th>
                      <th class="text-dark">Producto</th>
                      <th class="text-dark">Precio</th>
                      <th class="text-dark">Extras</th>
                      <th class="text-dark">Precio extras</th>
                      <th class="text-dark">Total</th>
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
                  <td class="text-dark"><?php echo $mostrar['cantidad'] ?></td>
                  <td class="text-dark"><?php echo $mostrar['nombre_prod'] ?></td>
                  <td class="text-dark">$<?php echo $mostrar['precio_prod'] ?></td>
                  <td class="text-dark"><?php echo $mostrar['nom_ext'] ?></td>
                  <td class="text-dark">$<?php echo $mostrar['precio_extra'] ?></td>
                  <td class="text-dark">$<?php echo $mostrar['total'] ?></td>
                </tr>
              </tbody>
              <?php
              }  
              ?>
            
            <?php
        }
    }

}else{
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    No se puede agregar productos al pedido en el estado actual
    </div>
    HERE;
    ?>
    <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Ir al detalle del pedido</a>
    <a class= "btn-sm btn-primary" href="pedidos.php" class="table__item__link" >Ir al listado de pedidos</a>
    <?php
}













/*pedidos_solicitados
Es insert
$nro_pedido --> Ya lo tengo
$cantidad --> Siempre 1
$nombre_prod --> Hacer búsqueda en la tabla productos
$precio_prod --> Hacer búsqueda en la tabla productos
$total --> Igual a $precio_prod
$fecha_ped --> Recuperar de la tabla pedidos_solicitados
$nom_extra --> Va vacio
$precio_extra --> Va en 0
*/
/*pedidos
es update

$ult_act_pedido --> usar funcion date
$usuario --> Usar Session
$total_pedido = $total + $total_pedido
*/



?>