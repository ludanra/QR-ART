<?php
$nro_pedido= $_GET['id'];

include ("base_de_datos.php");
$conexion=mysqli_connect("localhost","root","","qr_art");
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet " href="../../assets/adminlte.css">
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="../../../assets/table.css">
    <link rel="stylesheet " href="../../../assets/backpedi.css">
</head>

<body>


        
        
      </ul>
    
    
      
    </div>
  </div>
</nav>
<br>

<div class="content-header ">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <h4 class="text-center text-dark">Detalles de pedido: <?php echo $nro_pedido ?> </h4>
                    <h4 class="text-center text-dark">Estado pedido: <?php echo $estado_ped ?> </h4>
                    <h4 class="text-center text-dark">Total pedido: $<?php echo $total_pedido ?> </h4>
                </div>
                <?php
                if ($estado_ped=="Pte de pago"){
                    ?>
                    <a class= 'btn btn-success' href="agrega_producto.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Agregar Producto</a >
                <?php
                }
                ?>

                <!-- /.col -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</div>
  

    <table id="pedidos_solicitados" name="pedidos_solicitados" class="table table-striped" style="width:100%">




    
        <thead>
            <tr>
                <th class="text-dark">ID_producto</th>
                <th class="text-dark">Producto</th>
                <th class="text-dark">Precio producto</th>
                <th class="text-dark">Extras</th>
                <th class="text-dark">Acciones</th>
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
            <td class="text-dark"><?php echo $mostrar['nombre_prod'] ?></td>
            <td class="text-dark">$<?php echo $mostrar['precio_prod'] ?></td>
            <td class="text-dark"><?php echo $mostrar['nom_ext'] ?>
            <td>
            <?php
            if ($mostrar['nom_ext']=="" || $mostrar['nom_ext']=="Sin extras"){
                ?>
                <a class= "btn-sm btn-primary" href="agrega_extras.php?id=<?php echo $mostrar['id_ped_sol']?>" class="table__item__link" >Agrega Extra</a>
                <?php
            }else{?>
                <a class= "btn-sm btn-primary" href="elimina_extra_pedido.php?id1=<?php echo $mostrar['id_ped_sol']?>&id2=<?php echo $total_pedido?>&id3=<?php echo $nro_pedido?>" class="table__item__link" >Elimina Extra</a>
                </td>
            <?php
            }
            ?>
            </td>
            <td class="text-dark">$<?php echo $mostrar['precio_extra'] ?></td>
            <td class="text-dark">$<?php echo $mostrar['total'] ?>
          </tr>
        </tbody>
        <?php
        }  
        ?>




<a class= "btn-sm btn-primary" href="emite_pedido.php?id=<?php echo $nro_pedido?>" class="table__item__link" >Avanzar</a>


  
    </table>
    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
        <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>
    </footer>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#pedidos').DataTable();
        });
    </script>



</body>

</html>