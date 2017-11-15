<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>

<?php   

            $caritas =  base64_decode($this->session->userdata('cripto'));
            //$caritas ='1321'; 
            $c1 =  (int) ($caritas / 1000);
            $c2 =   (int) (($caritas % 1000) / 100 );
            $c3 =   (int) (($caritas % 100) / 10 );
            $c4 =   (int) (($caritas % 10)  );

            /*echo $c1.'<br/>';
            echo $c2.'<br/>';
            echo $c3.'<br/>';
            echo $c4.'<br/>';
            die;
            */
            //print_r($pregunta->pregunta);die;

        ?>

<div class="container mecanica">
<br><br><br><br><br>
<div class="col-md-12 text-center">
<h2>Elije 2 cartas para ganar puntos</h2>
</div>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">

	<div id="card1"> 
	  <div class="front" carta="1" valor="<?php echo $c1; ?>"> 
        <?php 

        $destino =  ( substr_count($this->session->userdata('tarjeta_participante'),'1+')>=1) ? '' : 'data-target="#lightbox"'; 
            $imagen = ( substr_count($this->session->userdata('tarjeta_participante'),'1+')>=1) ? 'card'.$c1.$c1.'.png' : 'card1.png';
        ?>

	  	<a href="#" class="" data-toggle="modal" <?php echo $destino; ?> >
	    	<img src="<?php echo base_url()?>img/cartas/<?php echo $imagen; ?>">
	    </a>
	  </div> 
	  <div class="back">
    	   <img src="<?php echo base_url().'img/cartas/card'.$c1.$c1.'.png'?>">
	  </div> 
	</div>		
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
	<div id="card2"> 
	  <div class="front" carta="2" valor="<?php echo $c2; ?>"> 
	  	        <?php $destino =  ( substr_count($this->session->userdata('tarjeta_participante'),'2+')>=1) ? '' : 'data-target="#lightbox2"'; 
                $imagen = ( substr_count($this->session->userdata('tarjeta_participante'),'2+')>=1) ? 'card'.$c2.$c2.'.png' : 'card1.png';
        ?>
        <a href="#" class="" data-toggle="modal" <?php echo $destino; ?> >
	    	<img src="<?php echo base_url()?>img/cartas/<?php echo $imagen; ?>">
	    </a>
	  </div> 
	  <div class="back">
	    
        <img src="<?php echo base_url().'img/cartas/card'.$c2.$c2.'.png'?>">
	  </div> 
	</div>		
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
	<div id="card3"> 
	  <div class="front" carta="3" valor="<?php echo $c3; ?>">
	  	<?php $destino =  ( substr_count($this->session->userdata('tarjeta_participante'),'3+')>=1) ? '' : 'data-target="#lightbox3"'; 
        $imagen = ( substr_count($this->session->userdata('tarjeta_participante'),'3+')>=1) ? 'card'.$c3.$c3.'.png' : 'card1.png';
        ?>
        <a href="#" class="" data-toggle="modal" <?php echo $destino; ?> >
	    	<img src="<?php echo base_url()?>img/cartas/<?php echo $imagen; ?>">
	    </a>
	  </div> 
	  <div class="back">
	    
        <img src="<?php echo base_url().'img/cartas/card'.$c3.$c3.'.png'?>">
	  </div> 
	</div>		
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
	<div id="card4"> 
	  <div class="front" carta="4" valor="<?php echo $c4; ?>"> 
	  	<?php $destino =  ( substr_count($this->session->userdata('tarjeta_participante'),'4+')>=1) ? '' : 'data-target="#lightbox4"'; 
        $imagen = ( substr_count($this->session->userdata('tarjeta_participante'),'4+')>=1) ? 'card'.$c4.$c4.'.png' : 'card1.png';
        ?>
        <a href="#" class="" data-toggle="modal" <?php echo $destino; ?> >
	    	<img src="<?php echo base_url()?>img/cartas/<?php echo $imagen; ?>">
	    </a>
	  </div> 
	  <div class="back">
	    <img src="<?php echo base_url().'img/cartas/card'.$c4.$c4.'.png'?>">
	  </div> 
	</div>		

</div>



<!--imagen 1 
<div id="pregunta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="preguntas" style="padding:80px">
        <div class="col-md-7 text-center contenedorpregu">
            <span class="titulopop">
                Verdadera Identidad de CYBORG
            </span>
            <ul class="listapop">
                <li>A) Victor stone</li>
                <li>B) Barry Allen</li>
                <li>C) Bruce Wayne</li>
            </ul>
            <div class="col-md-4 text-center">
                <button class="btn_respuesta" fig="1" resp="1"><img src="<?php echo base_url()?>img/cartas/btn1.png"></button>
            </div>
            <div class="col-md-4 text-center">
                <button class="btn_respuesta" fig="1" resp="2"><img src="<?php echo base_url()?>img/cartas/btn2.png"></button>
            </div>
            <div class="col-md-4 text-center">
                <button class="btn_respuesta" fig="1" resp="3"><img src="<?php echo base_url()?>img/cartas/btn3.png"></button>
            </div>
            <div class="col-md-12 text-center">
                <span class="reloj"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="r1"></span></span>
            </div>
        </div>
        <div class="col-md-5">
            <img src="<?php //echo base_url().'img/cartas/card'.$c1.$c1.'.png'?>">

        </div>

    </div> 
</div>

-->
</div>
<script>

//https://nnattawat.github.io/flip/
    jQuery(document).ready(function($) {
        //si es la primera vez entonces
        /*
        if (!(localStorage.getItem('fondo'))) {
            localStorage.setItem('fondo',  'nada' );
        }
        
        if (!(localStorage.getItem('tiempo_fondo'))) {
            
            localStorage.setItem('tiempo_fondo', '00:00:00' );
            $('span.r1').html(localStorage.getItem('tiempo_fondo'));
        }*/

        if (!(localStorage.getItem('virada'))) {
            localStorage.setItem('virada',  0 );
        }



                    //cuando se oculta la ventana modal de felicidades se redirige al 
            jQuery("body").on('hide.bs.modal','#modalMessage3',function(e){    
                $catalogo = jQuery(this).attr('direccion'); //e.target.name;
                //alert($catalogo);
                window.location.href = '/'+$catalogo;                           
                //window.location.href = '/';
            }); 


           jQuery('body').on('click','.btn_respuesta', function (e) {  

                
                  e.preventDefault();
                    jQuery.ajax({ //guardar en la cookie el conteo
                            url : '/respuesta_juego',
                            data : { 
                                   figura: $(this).attr('fig'),
                                respuesta: $(this).attr('resp'),
                                
                            },
                            type : 'POST',
                            dataType : 'json',
                            success : function(data) {  
                                  localStorage.setItem('virada',  0 );

                                  //redireccionar a record
                                  //window.location.href = '/'+data.redireccion;        

                                    //levantar la modal de felicidades
                                    var url = "/proc_modal_felicidades";  
                                    jQuery('#modalMessage3').modal({
                                        show:'true',
                                        remote:url,
                                    });
                                  return false;

                            }

                    }); 
                    
            });
             

          if ( parseInt(localStorage.getItem('virada')) >=2) {
               // alert('aa');
                //localStorage.setItem('virada',  0 );
                var url = "/proc_modal_juego";  
                
                jQuery('#modalMessage').modal({
                    backdrop: 'static',
                    keyboard: false, 
                    show:'true',
                    remote:url,
                });

            }  

        jQuery("#card1,#card2,#card3,#card4").flip({
           trigger: 'manual'
        });
        
        //cuando da click encima de las imagenes
        jQuery('body').on('click','a[data-toggle="modal"]', function (e) {   
                        var este= $(this);
                        jQuery.ajax({ //guardar en la cookie el conteo
                                url : '/respuesta_tarjeta',
                                data : { 
                                       figura: $(this).parent().attr('carta'),
                                       valor: $(this).parent().attr('valor'),
                                },
                                type : 'POST',
                                dataType : 'json',
                                success : function(data) {  
                                        localStorage.setItem('virada',  parseInt(localStorage.getItem('virada'))+1 );
                                        if ( parseInt(localStorage.getItem('virada')) >=2) {
                                            //localStorage.setItem('virada',  0 );
                                            var url = "/proc_modal_juego";  
                                            
                                            jQuery('#modalMessage').modal({
                                                backdrop: 'static',
                                                keyboard: false, 
                                                show:'true',
                                                remote:url,
                                            });
                                        }
                                      return false;
                                }
                        }); 



                     

                

            
              
        });            
        
        


        jQuery('body').on('click','#card1 [data-target="#lightbox"]', function (e) {               
          jQuery("#card1").flip(true);          //jQuery("#card").off('flip'); //no flipear
        });
        jQuery('body').on('click','#card2 [data-target="#lightbox2"]', function (e) {       
        
          jQuery('#card2').flip(true);
        });
        jQuery('body').on('click','#card3 [data-target="#lightbox3"]', function (e) {               
          jQuery("#card3").flip(true);
        });
        jQuery('body').on('click','#card4 [data-target="#lightbox4"]', function (e) {               
          jQuery("#card4").flip(true);
        });





    });
</script>

<?php $this->load->view( 'footer' ); ?>

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