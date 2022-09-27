<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
          <font size="6"><label id="label1"></label></font>
        </div>
        <div class="modal-footer">
            <a class="btn btn primary" id="boton_redirect" href="">OK</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<?php
    $mensaje="";
    $redireccion="";

    function MensajeAlerta ($mensaje, $redireccion){
        echo '<button type="button" id="verModal" style="display: none";class="btn btn-info btn-lg" data-target="#myModal" data-messaje="'.$mensaje.'" data-redireccion="'.$redireccion.'"> </button>'

    }


?>