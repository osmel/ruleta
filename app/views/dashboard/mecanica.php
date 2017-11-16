<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>


 <!-- contenido-->
<div class="container mecanica">
	<div class="row">
		<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="text-center">Como participar</h2>
		</div> -->
		
		<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$this->session->userdata('c24'); ?>" class="img-responsive img-center">
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$this->session->userdata('c25'); ?>" class="img-responsive img-center">
		</div> -->
		<div class="col-lg-1 col-md-1 col-sm-1 text-center">
		</div>	
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center">
			<img src="<?php echo base_url()?>img/mecanica1.png" style="margin-top: 78px;" class="img-responsive sinizquierdo">
		</div>	
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center">
			<img src="<?php echo base_url()?>img/mecanica2.png" style="margin: 0px auto;" class="img-responsive sinizquierdo">
		</div>	
		<div class="col-lg-1 col-md-1 col-sm-1 text-center">
		</div>	
		
	</div>
</div>



<?php $this->load->view( 'footer' ); ?>