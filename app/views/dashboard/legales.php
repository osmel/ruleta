<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>

<style type="text/css">
	/*body {
    background-image: url('<?php echo base_url().$this->session->userdata('c8'); ?>') !important;
    background-repeat: no-repeat;
    background-size: 100% auto;
    background-position: center top;
	}
	@media screen and (max-width: 480px) {
		body {	   
	    background-size: 200% auto;
		}
	}*/
</style>

 <!-- aviso-->

<div class="container aviso">
  <div class="row">
    <div class="container registro">  
<div class="col-md-12 text-center" style="margin-top:30px;margin-bottom:20px">
  <img src="<?php echo base_url()?>img/aviso.png">
</div>
  </div>

		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 transparencia">
     
	</div>

	</div>

</div>


<?php $this->load->view( 'footer' ); ?>
