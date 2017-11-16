<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php  $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>

<?php
 	if (!isset($retorno)) {
      	$retorno ="record"."/".$this->session->userdata('id_participante');
    }
?>   




<div class="intro juego">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center contadores">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			 <button type="button"    class="spinBtn btn btn-danger" >GIRAR</button>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
			<div class="countdown"><?php echo $cantidad; ?></div>
			<h5>Cantidad de veces Jugas</h5>

		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">			
			<div class="cant"><?php echo $total_iguales; ?></div>
			<h5>CORAZONES ACUMULADOS <br>EN TU CUENTA</h5>
		</div>		   	    	
	</div>

    <div class="wheelContainer">
       
        <svg class="wheelSVG" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" text-rendering="optimizeSpeed">
            <defs>
                <filter id="shadow" x="-100%" y="-100%" width="550%" height="550%">
                    <feOffset in="SourceAlpha" dx="0" dy="0" result="offsetOut"></feOffset>
                    <feGaussianBlur stdDeviation="9" in="offsetOut" result="drop" />
                    <feColorMatrix in="drop" result="color-out" type="matrix" values="0 0 0 0   0
              0 0 0 0   0 
              0 0 0 0   0 
              0 0 0 .3 0" />
                    <feBlend in="SourceGraphic" in2="color-out" mode="normal" />
                </filter>
            </defs>
            <g class="mainContainer">

                <g class="wheel">
                    <!-- <image  xlink:href="http://example.com/images/wheel_graphic.png" x="0%" y="0%" height="100%" width="100%"></image> -->
                </g>
            </g>
            <g class="centerCircle" />
            <g class="wheelOutline" />
            <g class="pegContainer" opacity="1">
                <path class="peg" fill="#EEEEEE" stroke="4" d="M22.139,0C5.623,0-1.523,15.572,0.269,27.037c3.392,21.707,21.87,42.232,21.87,42.232 s18.478-20.525,21.87-42.232C45.801,15.572,38.623,0,22.139,0z" />
            </g>
            <g class="valueContainer" />
        </svg>

		<img class="logo_centro" src="img/ley.png" border="0" style="width:150px; heigth:auto">
        
        <div class="toast">
         	<p></p>         	            
        </div>

        

    </div>

   

</div> <!-- container -->

<?php $this->load->view( 'footer' ); ?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/utils/Draggable.min.js'></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>js/juego/ThrowPropsPlugin.min.js"></script> 
 <script type="text/javascript" src="<?php echo base_url(); ?>js/juego/Spin2WinWheel.min.js"></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/TextPlugin.min.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/juego/index.js"></script> 




<div class="modal fade bs-example-modal-lg" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>  


<div class="modal fade bs-example-modal-lg" id="modalMessage3" direccion="<?php echo 'record/'.$this->session->userdata('id_participante');?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>  

<script type="text/javascript">
	$(document).ready(function() {
		setTimeout(function(){
			ajustar();
		}, 10);
		
	});

	$(window).resize(function() {
		ajustar();
	});

	function ajustar(){
		altoRueda = $('.wheelContainer .wheelSVG').height();
		$('.wheelContainer').css({'height':altoRueda});
	}
</script>
