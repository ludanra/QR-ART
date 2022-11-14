<?php


$conexion=mysqli_connect("localhost","root","","qr_art");
if (isset($_GET['cod'])){

  $consulta = "SELECT * FROM productos WHERE cod_prod=" .$_GET['cod'];

  
  $result = mysqli_query($conexion, $consulta);


  
  if(mysqli_num_rows($result)> 0){

    $filas= mysqli_fetch_row($result);

  }else{

    header('location:../index.php');
  
  }  

  
}else{

  header('location:../index.php');
}









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
    <link rel="stylesheet" href="../styles.css">
    <title>Detalle del producto</title>


    
</head>
<body>
    <header class="header-custom">
      <nav class="navbar navbar-expand-sm fixed-top navbar-light">
          <div class="container">
              <a class="display-2 m-2 text-light" href="./../index.php"><i class='bx bxs-left-arrow-circle'></i></a>
              </div>
          </div>
      </nav>


      
    
    </header>
  

    <div class="container">

      <div class="d-flex flex-column p-3">






        <div class="d-flex justify-content-between h1">

          <i class='bx bx-chevrons-down'></i><i class='bx bx-chevrons-down'></i><i class='bx bx-chevrons-down'></i>
          
        </div>

        
              <h1 class="display-5 m-3 text-center" style="font-weight:bold;"><?php echo $filas[2];?></h1>
               <p><small><?php echo $filas[4];?></h3>


      </div>


  
      <div class="card border-0">
          <h5 class="card-header h6 bg-dark text-white p-3">Unidades</h5>
          <div class="d-flex justify-content-between p-3">
            <p class="mb-0 my-1"><small>Selecciona la cantidad</small></p>
           
                <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div></td>
    
          </div>
        </div>
   
       

      <hr>

      
      <!-- accordion -->

      <div class="accordion" id="accordionExample">
        <div class="accordion-item border-0">
          <h2 class="accordion-header" id="headingOne">
            <button class=" btn accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Extras
            </button>
          </h2>

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    

                    


                    $consulta = "SELECT (p.categ_extra) as categ_extra, (e.nombre_extra) as nombre_extra
                    FROM productos p 
                    INNER JOIN extra e 
                    on p.categ_extra = e.categ_extra 
                    WHERE cod_prod =" .$_GET['cod'];
                    
                    
                    
                   

                   
                    $result = mysqli_query($conexion, $consulta);




                 while($fila=mysqli_fetch_array($result)){

                  
            

                ?>

                 


          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="card border-0">
                <div class="d-flex justify-content-between p-3">
                  <p class="mb-0 my-1"><small><?php echo $fila['nombre_extra'];?></small></p>
                  <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div></td>
                </div>
    
            </div>
          </div>

          
            <?php

            } 




            ?>
        </div>
      </div>

      <hr>
      <!-- notas -->

        <div class="card border-0">
          <h5 class="card-header bg-dark text-light h6 p-3">Notas</h5>
          <p class="m-3"><small>Una nota para el cocinero...</small></p>
          <div class=" mx-3 mb-3 w-75 mb-5">
            <input type="text"  class="form-control" placeholder="Sin sal, Sin cebolla, etc" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <!-- Button to the cart -->
        <div class="d-flex justify-content-center m-3  mb-5">
        <p><a href="cart.php?cod=<?php echo $filas[0]?>" class= "btn btn-warning">Pedir</a></p>     
        </div>
      </div>

  
      





    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
    <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

  </footer>

    <!-- Bootstrap js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- App.js script -->
    <script src="../app.js"></script>

</body>
</html>