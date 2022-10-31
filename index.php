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
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="bg-dark d-flex justify-content-center align-items-center py-3 text-light flex-column">
        <!-- logo del lugar -->
        <h1> Menú</h1>
    </header>
    <!-- Swiper -->



    <div class="container mb-5">

        <h5 class="my-4 display-5">Promos📢</h5>
        <div class="slider">
            <ul>

                <li> <img src="assets/img/promo1.PNG " class="card-img-top" style="max-height: 150px;" alt=""></li>
                <li> <img src="assets/img/promo2.PNG" class="card-img-top" style="max-height: 150px;" alt=""></li>
                <li> <img src="assets/img/promo3.PNG" class="card-img-top" style="max-height: 150px;" alt=""></li>
                <li> <img src="assets/img/promo4.PNG" class="card-img-top" style="max-height: 150px;" alt=""></li>

            </ul>

        </div>

        <h2 class="my-4 display-5">Mas vendidos!</h2>


        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
            <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
                <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/burger1.jpg" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">BOMBA BAR</h5>
                            <p class="card-text p">4 medallones,4 fetas de cheddar,4 fetas de dambo y manteca</p>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$850</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="2 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/burger2.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">CHACO</h5>
                            <p class="card-text">cheddar,panceta,cebolla,mayo parrillera</p>

                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$850</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="3 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/burger3.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">TRIPLE</h5>
                            <p class="card-text">medallones,4 fetas de chedar,4 fetas de dambo y manteca</p>

                        </div>
                        <div class="justify-content-end align-content-end p-3">
                            <p class="card-text">$850</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="4 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/burger4.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">Berni</h5>
                            <p class="card-text">2 medallones, 3 fetas de chedar, 2 fetas de panceta, pan de papa</p>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$850</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <h2 class="my-4 display-5">Burger🍔</h2>

                   
        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE categoria_prod= 1";
                    $result = mysqli_query($conexion, $consulta);




                 while($fila=mysqli_fetch_array($result)){
              

                ?>

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$fila['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $fila['nombre_prod'];?></h6>
                <p class="card-text"><?php echo $fila['detalle_prod'];?></p>
                </div>

                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo $fila['precio_prod'];?></p>
                <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                </div>

               </div>
               </div> 


            <?php

            } 




            ?>
          </div>

        </div>




        <h2 class="my-4 display-5">Para Picar🍟</h2>

        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE categoria_prod= 2";
                    $result = mysqli_query($conexion, $consulta);




                 while($fila=mysqli_fetch_array($result)){
              

                ?>

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$fila['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $fila['nombre_prod'];?></h6>
                
                </div>

                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo $fila['precio_prod'];?></p>
                <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                </div>

               </div>
               </div> 


            <?php

            } 




            ?>
          </div>

        </div>



        <h2 class="my-4 display-5">Pizzas🍕</h2>



        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
          <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
             

                <?php

                    $conexion=mysqli_connect("localhost","root","","qr_art");


                    $consulta = "SELECT * FROM productos WHERE categoria_prod= 3";
                    $result = mysqli_query($conexion, $consulta);




                 while($fila=mysqli_fetch_array($result)){
              

                ?>

               <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
               <div class="card h-100">
                 <img id="image" name="image"  class="card-img-top" style="max-height: 150px;" alt="imageNotFound" src="<?php echo "imagenes/productos/".$fila['foto_prod'] ?>">

                <div class="card-body">
                <h6 class="card-title"><?php echo $fila['nombre_prod'];?></h6>
                <p class="card-text"><?php echo $fila['detalle_prod'];?></p>
               
                </div>

                <div class="justify-content-end p-3">
                <p class="card-text"><?php echo $fila['precio_prod'];?></p>
                <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                </div>

               </div>
               </div> 


            <?php

            } 




            ?>
          </div>

        </div>



        <h2 class="my-4 display-5">Cervezas🍻</h2>


        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
            <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
                <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/Cerveza1.PNG" class="card-img-top" style="min-height: 150px; max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">GOLDEN</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="2 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/cerveza2.PNG" class="card-img-top" style="min-height: 150px; max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">HONEY</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="3 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/cerveza3.PNG" class="card-img-top" style="min-height: 150px; max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">SCOTTISH</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="4 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/cerveza4.PNG" class="card-img-top" style="min-height: 150px; max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">IPA</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <h2 class="my-4 display-5">Tragos🍹</h2>


        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden ">
            <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
                <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/fernet.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">FERNET</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="2 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/campari.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">CAMPARI</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="3 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/gancia.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">GANCIA</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="4 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/jagger.PNG" class="card-img-top" style="max-height: 150px; min-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">JAGGER</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <h2 class="my-4 display-5">Cafeteria☕</h2>


        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden mb-5">
            <div class="swiper-wrapper" id="swiper-wrapper-de426edc421108aa6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-294px, 0px, 0px);">
                <div class="swiper-slide" role="group" aria-label="1 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/cafe.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">CAFE CORTADO</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="2 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/jugo.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">JUGO DE NARANJA</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="3 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/tostado.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">TOSTADO JYQ</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide" role="group" aria-label="4 / 9" style=" margin-right: 30px;">
                    <div class="card h-100">
                        <img src="assets/img/medialunas.PNG" class="card-img-top" style="max-height: 150px;" alt="imageNotFound">
                        <div class="card-body">
                            <h5 class="card-title">MEDIALUNAS</h5>
                        </div>
                        <div class="justify-content-end p-3">
                            <p class="card-text">$390</p>
                            <a href="assets/pages/detail.html" class="btn button-custom-secondary">Agregar al pedido</a>
                        </div>
                    </div>
                </div>
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


</body>

</html>