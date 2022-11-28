
<?php

session_start();

$conexion=mysqli_connect("localhost","root","","qr_art");







$id= rand(1,10);









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




<header class="bg-white d-flex justify-content-center align-items-center py-3 text-light flex-column">
    <!-- logo del lugar -->
    <img class="logo-custom" src="assets/img/pixlr-bg-result.png" alt="LogoNotFound" style="margin-top: 50px;">
    <h1 class="text-dark" >Bienvenido</h1>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet " href="assets/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet " href="assets/backadmin.css">
    <!-- Daterange picker -->

</header>

<a type="button" class="btn btn-dark my-2 text-center" href="index.php?cod_mesa=<?php echo $id ?>">Ingresar</a>




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