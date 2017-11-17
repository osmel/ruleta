<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
 	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }
 $hidden = array('nada'=>'nada'); 

 ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
	</div>
	<div class="modal-body">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<span class="titular1">
        		 <img src="<?php echo base_url()?>img/felicidades.png" style="width:100%">
        	</span>
        	<span class="ganastext">
        		¡GANASTE <?php echo $total; ?> PUNTOS!
        		  
        	</span>
		</div>
	</div>
	<div class="modal-footer">
		<div class="cont">
			<button type="button" class="close continuar ingresar" data-dismiss="modal" aria-label="Close">
				
					CONTINUAR
				
			</button>
		</div>
	</div>
