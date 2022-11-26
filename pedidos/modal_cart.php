
<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
                                if($carrito_mio[$i]!=NULL){
							?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
								
								    
									
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['nombre_prod']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?> <br><br><span class="text-muted"  style="text-align: right; color: #000000;"> $ <?php echo $carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad'];    ?> </span></h6>
									
									
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 120px;"></button>
									</div>
									
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad']);
							}
                            }
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total ($)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio_prod'] * $carrito_mio[$i]['cantidad']);
                            }
							}}}
                            if(!isset($total)){$total = '0';}else{ $total = $total;}
							echo $total; ?>  </strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
     
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="pedidos/borrarcarro.php">Vaciar carrito</a>
        <a type="button" class="btn btn-success" href="pedidos/Editar-BorrrarPedido.php">Continuar pedido</a>
      </div>
    </div>
  </div>
</div>
<!-- MODAL CARRITO -->