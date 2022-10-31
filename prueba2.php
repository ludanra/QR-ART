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
                 <img id="image" name="image"  style="border: 2px solid ; width: 150px;" alt="" src="<?php echo "imagenes/productos/".$fila['foto_prod'] ?>">

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