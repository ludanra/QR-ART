<?php
session_start();

$conexion=mysqli_connect("localhost","root","","qr_art");

if(isset($_SESSION['carrito'])){

  

  

  if(isset($_GET['cod'])){


    
    $array=$_SESSION['carrito'];

    $encontro= false;
    $numero=0;

    for($i=0;$i<count($array);$i++){

      if($array[$i]['cod']==$_GET['cod']){

        $encontro=true;
        $numero=$i;
      }
    }

    if($encontro == true){
      $array[$numero]['cantidad']=$array[$numero]['cantidad'] +1;

      $_SESSION['carrito']=$array;
      header("Location:cart.php");


    }else

    $nombre_prod ="";
    $precio_prod ="";
    $foto_prod ="";



    $consulta = "SELECT * FROM productos WHERE cod_prod=" .$_GET['cod'];

    $result = mysqli_query($conexion, $consulta);

    $fila= mysqli_fetch_row($result);

    $nombre_prod = $fila[2];
    $precio_prod = $fila[3];
    $foto_prod = $fila[5];

    $arraynuevo = array(
        
        'cod'=>$_GET['cod'],
        'nombre'=>$nombre_prod,
        'precio'=>$precio_prod,
        'foto'=>$foto_prod,
        'cantidad'=> 1
        
        
    );

    array_push($array, $arraynuevo);
    $_SESSION['carrito']=$array;
    header("Location:cart.php");


  }

}else{

    if(isset($_GET['cod'])){

        $nombre_prod ="";
        $precio_prod ="";
        $foto_prod ="";
      

        $consulta = "SELECT * FROM productos WHERE cod_prod=" .$_GET['cod'];

        $result = mysqli_query($conexion, $consulta);

        $fila= mysqli_fetch_row($result);

        $nombre_prod = $fila[2];
        $precio_prod = $fila[3];
        $foto_prod = $fila[5];
        

        $array[]= array(
            
            'cod'=>$_GET['cod'],
            'nombre'=>$nombre_prod,
            'precio'=>$precio_prod,
            'foto'=>$foto_prod,
            'cantidad'=> 1
            
            
        );

        $_SESSION['carrito']=$array;
        header("Location:cart.php");




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
   <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet " href="../../../assets/stylesnav.css">
    <link rel="stylesheet " href="../../../assets/back.css">
    <link rel="stylesheet " href="../../../assets/table.css">
   
    <!-- overlayScrollbars -->
    
</head>




<body>

      
    </div>
  </div>
</nav>



    <table id="pedidos" class="table table-striped" style="width:100%" class="text-light">
        <thead>
            <tr class="text-dark">
                <th class="text-dark">Poducto</th>
                <th class="text-dark">Precio</th> 
                <th class="text-dark">Foto</th>
                <th class="text-dark">Cantidad</th>
                <th class="text-dark">Eliminar</th>
               
             
            </tr>
        </thead>

        
        <tbody>

        <?php
        
        $total=0;

        if(isset($_SESSION['carrito'])){

         

            for($i=0;$i<count($_SESSION['carrito']);$i++){

            $total= $total + ($_SESSION['carrito'][$i]['precio'] * $_SESSION['carrito'][$i] ['cantidad']);


          

        ?>



            <tr>
                <td class="text-dark" ><?php echo $_SESSION['carrito'][$i] ['nombre'] ?></td>
                <td class="text-dark"><?php echo '$'; echo $_SESSION['carrito'][$i] ['precio'] * $_SESSION['carrito'][$i] ['cantidad']?></td>
                <td class="text-dark"><?php echo $_SESSION['carrito'][$i] ['foto'] ?></td>
                <td class="text-dark"><?php echo $_SESSION['carrito'][$i] ['cantidad'] ?></td>
                <td><a href="#" class="btn btn-danger btn-sm btnEliminar" data-cod=<?php echo $_SESSION['carrito'][$i] ['cod'];?>>X</a></td>
              
            
              
               
                  
                            
              
              
              
                 </td>
               
             

 
            </tr>

            <?php

        } }

            ?>
           
        </tbody>
        

    </table>
    <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Subtotal</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo '$'; echo $total; ?> </strong>
                  </div>
                </div>
                </div>
                
               <!-- Button to the cart -->
        <div class="d-flex justify-content-center m-3  mb-5">
          <a href="./../index.php" class= "btn btn-primary" >Seguir pidiendo</i></a>
          
          <a href="./../index.php" class= "btn btn-warning" >Pedir</i></a>
        </div>
      </div>
      


    <footer class="py-0 mt-5 border-top bg-dark fixed-bottom">
            <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>



   
  
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 

    <script>

      $(document).ready(function(){

        $(".btnEliminar").click(function(event){

          event.preventDefault();
 
          var cod = $(this).data('cod');
          var boton =$(this);

          $.ajax({

            method:'POST',

            url:'./Eliminar.php',

            data:{

              cod:cod
            }


          }).done(function(respuesta){

            boton.parent('td').parent('tr').remove();

            
            
            

          }); 
          


        });


      });


   </script>
 
    



</body>

</html>

