<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJEMPLO MODAL</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <script src="js/bootstrap.min.js"></script>


    <form class="row g-3 container-fluid" method="POST">
              
        <div class="col-md-6">           
            <input type="text" name="nombre" class="form-control" id="validationDefault01" placeholder="NOMBRE" required>
        </div>

        <div class="col-md-6">          
            <input type="text" name="apellido" class="form-control" id="validationDefault02" placeholder="APELLIDO" required>
        </div>


        <div class="cotainer width: auto; margin: 40px auto;">       
            
            <div class="col-4">
                
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom: 10px;">CARGA</button>

                <!-- Ventana EMergente del modal-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-warning border-warning border-4">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">CONFIRMA LA CARGA?</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Se cargara el registro
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <!-- este es el nombre del boton que usaremos en la funcion-->
                                <button type="submit" class="btn btn-warning" name="carga">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <?php
    include ("funciones2.php");
    saludo();
    ?>




</body>

</html>