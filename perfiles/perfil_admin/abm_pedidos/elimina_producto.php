<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
$id= $_GET['id'];
$nro_pedido = $_GET['id'];

if(empty($_GET['id'])){
  header('location:../perfiles/perfil_admin/abm_pedidos/pedidos.php');
}
$query="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id'";
$sql="SELECT * FROM pedidos_solicitados WHERE id_ped_sol='$id'";
$result=mysqli_query($conexion, $sql);
$result_query=mysqli_num_rows($result);
if($result_query == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result)) {
    $nro_pedido = $data['nro_pedido'];
    $total = $data['total'];
    
  }
}

$query2="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$sql2="SELECT * FROM pedidos WHERE nro_pedido='$nro_pedido'";
$result2=mysqli_query($conexion, $sql2);
$result_query2=mysqli_num_rows($result2);
if($result_query2 == 0){
  header('location:pedidos.php');
}else{
  while($data=mysqli_fetch_array($result2)) {
    $estado_ped = $data['estado_ped'];
    $nro_pedido = $data['nro_pedido'];
    $total_pedido = $data['total_pedido'];
    $cod_mesa = $data['cod_mesa'];
    $estado_ped = $data['estado_ped'];
    $notas_ped = $data['notas_ped'];
    $fecha_pedido=$data['fecha_hora_ped'];
  }
}

if($estado_ped=="Pte de pago"){
    $nuevo_total=$total_pedido-$total;
    $hoy = date("Y-m-d H:i:s");
    session_start();
    $usuario= $_SESSION['usuario'];
    $eliminar= "DELETE FROM pedidos_solicitados WHERE id_ped_sol='$id'";
    $resultado = mysqli_query($conexion, $eliminar);
    if($resultado){
        $act_total= "UPDATE pedidos SET total_pedido='$nuevo_total', ult_act_ped='$hoy', usuario='$usuario' WHERE nro_pedido='$nro_pedido'";
        $resultado2 = mysqli_query($conexion, $act_total);
        if($resultado2){
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-warning" role="alert" "text-center">
            Producto eliminado correctamente
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
                <a class= "btn-sm btn-primary" href="detalle_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Ir al detalle del pedido</a>
                <a class= "btn-sm btn-primary" href="agrega_producto.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Agregar productos al pedido</a>
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
        }else{
            PRINT<<<HERE
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <div class="alert alert-danger" role="alert">
            El producto no pudo eliminarse
            </div>
            HERE;
            header("Refresh: 2; URL= pedidos.php");
        }

    }else{
        PRINT<<<HERE
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <div class="alert alert-danger" role="alert">
        El producto no pudo eliminarse
        </div>
        HERE;
        header("Refresh: 2; URL= pedidos.php");
    }
}else{
    PRINT<<<HERE
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="alert alert-danger" role="alert">
    No se puede eliminar un producto una vez que el pedido fue abonado
    </div>
    HERE;
    header("Refresh: 2; URL= pedidos.php");
}


