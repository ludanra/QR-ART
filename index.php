
<?php

session_start();

$conexion=mysqli_connect("localhost","root","","qr_art");





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

<body class="d-flex flex-column min-vh-100">


  
<!---navbar --->


<?php

include("pedidos/nav-cart.php");
include("pedidos/modal_cart.php");


?>


    <header class="bg-dark d-flex justify-content-center align-items-center py-3 text-light flex-column">
        <!-- logo del lugar -->
        <h1> Menú</h1>
    </header>
    <!-- Swiper -->



    <div class="container mb-5">

        

        <h2 class="my-4 display-5">Burger</h2>

                   
        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE est_baja_prod= 1 AND prod_disponible= 1 AND categoria_prod= 1";
                    $result = mysqli_query($conexion, $consulta);




                 while($resultado=mysqli_fetch_assoc($result)){
              

                ?>

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$resultado['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $resultado['nombre_prod'];?></h6>


                
              <form id="formulario" name="formulario" method="post" action="pedidos/cart.php">
              
              <input name="cod_prod" type="hidden" id="cod_prod" value="<?php echo $resultado["cod_prod"]; ?>" />                           
              <input name="precio_prod" type="hidden" id="precio_prod" value="<?php echo $resultado["precio_prod"]; ?>" />
              <input name="nombre_prod" type="hidden" id="nombre_prod" value="<?php echo $resultado["nombre_prod"]; ?>" />
              <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
          
      
                <p class="card-text"><?php echo $resultado['detalle_prod'];?></p>
                </div>

                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo "$"; echo $resultado['precio_prod'];?></p>
                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>

               </div>
               </div> 

            </form>
            <?php

            } 




            ?>
          </div>

        </div>




        <h2 class="my-4 display-5">Para Picar</h2>

        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE est_baja_prod= 1 AND prod_disponible= 1 AND categoria_prod= 2";
                    $result = mysqli_query($conexion, $consulta);




                 while($resultado=mysqli_fetch_assoc($result)){
              

                ?>

               

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$resultado['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $resultado['nombre_prod'];?></h6>
                
                </div>

        <form id="formulario" name="formulario" method="post" action="pedidos/cart.php">
              
        <input name="cod_prod" type="hidden" id="cod_prod" value="<?php echo $resultado["cod_prod"]; ?>" />                           
        <input name="precio_prod" type="hidden" id="precio_prod" value="<?php echo $resultado["precio_prod"]; ?>" />
        <input name="nombre_prod" type="hidden" id="nombre_prod" value="<?php echo $resultado["nombre_prod"]; ?>" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
    



                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo "$"; echo $resultado['precio_prod'];?></p>
                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>

               </div>
               </div> 
            </form>

            <?php

            } 




            ?>
          </div>

        </div>



        <h2 class="my-4 display-5">Pizzas</h2>



        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE est_baja_prod= 1 AND prod_disponible= 1 AND categoria_prod= 3";
                    $result = mysqli_query($conexion, $consulta);




                 while($resultado=mysqli_fetch_assoc($result)){
              

                ?>

               

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$resultado['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $resultado['nombre_prod'];?></h6>
                
                </div>

        <form id="formulario" name="formulario" method="post" action="pedidos/cart.php">
              
        <input name="cod_prod" type="hidden" id="cod_prod" value="<?php echo $resultado["cod_prod"]; ?>" />                           
        <input name="precio_prod" type="hidden" id="precio_prod" value="<?php echo $resultado["precio_prod"]; ?>" />
        <input name="nombre_prod" type="hidden" id="nombre_prod" value="<?php echo $resultado["nombre_prod"]; ?>" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
    



                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo "$"; echo $resultado['precio_prod'];?></p>
                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>

               </div>
               </div> 
            </form>

            <?php
            } 
            ?>
          </div>

        </div>


        <h2 class="my-4 display-5">Cervezas</h2>

        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE est_baja_prod= 1 AND prod_disponible= 1 AND categoria_prod= 4";
                    $result = mysqli_query($conexion, $consulta);




                 while($resultado=mysqli_fetch_assoc($result)){
              

                ?>

               

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$resultado['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $resultado['nombre_prod'];?></h6>
                
                </div>

        <form id="formulario" name="formulario" method="post" action="pedidos/cart.php">
              
        <input name="cod_prod" type="hidden" id="cod_prod" value="<?php echo $resultado["cod_prod"]; ?>" />                           
        <input name="precio_prod" type="hidden" id="precio_prod" value="<?php echo $resultado["precio_prod"]; ?>" />
        <input name="nombre_prod" type="hidden" id="nombre_prod" value="<?php echo $resultado["nombre_prod"]; ?>" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
    



                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo "$"; echo $resultado['precio_prod'];?></p>
                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>

               </div>
               </div> 
            </form>

            <?php
            } 
            ?>
          </div>

        </div>

        <h2 class="my-4 display-5">Tragos</h2>


        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE est_baja_prod= 1 AND prod_disponible= 1 AND categoria_prod= 5";
                    $result = mysqli_query($conexion, $consulta);




                 while($resultado=mysqli_fetch_assoc($result)){
              

                ?>

               

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$resultado['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $resultado['nombre_prod'];?></h6>
                
                </div>

        <form id="formulario" name="formulario" method="post" action="pedidos/cart.php">
              
        <input name="cod_prod" type="hidden" id="cod_prod" value="<?php echo $resultado["cod_prod"]; ?>" />                           
        <input name="precio_prod" type="hidden" id="precio_prod" value="<?php echo $resultado["precio_prod"]; ?>" />
        <input name="nombre_prod" type="hidden" id="nombre_prod" value="<?php echo $resultado["nombre_prod"]; ?>" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
    



                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo "$"; echo $resultado['precio_prod'];?></p>
                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>

               </div>
               </div> 
            </form>

            <?php
            } 
            ?>
          </div>

        </div>
        
    </div>
    </div>

    <footer class="py-3 mt-5 border-top bg-dark fixed-bottom">
        <p class="col-md-12 mb-0 text-light text-center">QR-ARTⒸ2022</p>

    </footer>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script src="assets/app.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>


</body>

</html>
