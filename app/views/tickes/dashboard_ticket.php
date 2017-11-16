<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php  $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>
<?php 

	if (!isset($retorno)) {
      	$retorno ="tarjetas";
    }

  


 $attr = array('class' => 'form-horizontal', 'id'=>'form_participantes','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
 echo form_open('/validar_tickets', $attr);
?>		

<input type="hidden" id="id_par" name="id_par" value="<?php echo $this->session->userdata('id_participante'); ?>">

<div class="container mecanica">

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- <h3 class="text-center"><strong><?php echo $this->session->userdata('c2'); ?></strong></h3> -->
				<h2 class="text-center">Registro de ticket</h2>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 transparenciaformularios registrof" style="float:none;margin:0px auto;padding: 32px 100px;">	
					
					
					<div class="form-group"  style="margin-bottom:0px">
						<label for="ticket" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Número de Ticket</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<input type="text" class="form-control" id="ticket" name="ticket" value="<?php echo $this->session->userdata('num_ticket_participante') ?>">
							 <span class="help-block" style="color:white;" id="msg_ticket"> </span> 
						</div>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right" style="margin-bottom:15px">
						<a class="ver-ticket">Ver ejemplo de ticket</a>
					</div>

					<div class="form-group">
						<label for="compra" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Fecha de compra</label>
						<div class="input-group date compra col-lg-9 col-md-9 col-sm-9 col-xs-12">
						  <input id="compra" name="compra" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span> 
						</div>
						<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 col-xs-offset-3">
							<span class="help-block" style="color:white;" id="msg_compra"> </span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="monto" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Monto de la compra</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<input type="text" class="form-control" id="monto" name="monto">
							<span class="help-block" style="color:white;" id="msg_monto"> </span> 
						</div>
					</div>

					<!--<div class="form-group" style="display: none;">
						<label for="transaccion" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Puntos obtenidos en la compra</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<input type="text" class="form-control" id="transaccion" name="transaccion" value="1">
							<span class="help-block" style="color:white;" id="msg_transaccion"> </span> 
						</div>
					</div>
					-->

					

		<div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-12 col-xs-12">
           <span class="help-block" style="color:white;" id="msg_general"> </span>
        </div>
					
					
					

				</div>
				
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: -12px;">
						<button type="submit" class="btn btn-info ingresar" value="REGISTRARME"/>
								REGISTRAR
						</button>
					</div>	
		
		</div>
		
	</div>
</div> 
<?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>

<div class="modal fade bs-example-modal-lg" id="modalMessage" ventana="redi_ticket" valor="<?php echo $retorno; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content modal-instrucciones"></div>
    </div>
</div>

<div class="ventana-ejemplos">
	<div class="close">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	</div>
	<div class="img-ticket" style="height:88%;text-align:center">		
		<img src="<?php echo base_url()?>img/new/ticket.jpg" style="height: 100%;width: auto;">
	</div>

	<div class="text-center" style="color:#fff">
		*Imágen de referencia
	</div>
	<div class="text-center exp">
		<span style="display:none">Monto de la compra</span> <span>Fecha de Compra</span>  <span>Número de Ticket</span>  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		  // Add smooth scrolling to all links
		  $("nav a").on('click', function(event) {
		  	
		    // Make sure this.hash has a value before overriding default behavior
		    if (this.hash !== "") {
		      // Prevent default anchor click behavior
		      event.preventDefault();

		      // Store hash
		      var hash = this.hash;

		      // Using jQuery's animate() method to add smooth page scroll
		      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		      $('html, body').animate({
		        scrollTop: $(hash).offset().top //-80
		      }, 800, function(){
		   
		        // Add hash (#) to URL when done scrolling (default click behavior)
		        window.location.hash = hash;
		      });

		    } // End if


		  });

		// alto = $('.navbar').outerHeight();
		
		// $('body').css('margin-top', alto);
		  
	});

	function cerrar(){	
	$('.ventana-ejemplos').css({'opacity':0});
	setTimeout(function(){
		$('.ventana-ejemplos').css({'z-index':'-100'});	
	},1000);
	
	}
	function abrir() {
		$('.ventana-ejemplos').css({'z-index':'2000'});
		$('.ventana-ejemplos').css({'opacity':1});
	}

	$('a.ver-ticket').click(function() {
		abrir();
	});

	$('.ventana-ejemplos .close').click(function() {
		cerrar();
	});
</script>

