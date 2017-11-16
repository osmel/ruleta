jQuery(document).ready(function($) {

	var opts = {
		lines: 13, 
		length: 20, 
		width: 10, 
		radius: 30, 
		corners: 1, 
		rotate: 0, 
		direction: 1, 
		color: '#E8192C',
		speed: 1, 
		trail: 60,
		shadow: false,
		hwaccel: false,
		className: 'spinner',
		zIndex: 2e9, 
		top: '50%', // Top position relative to parent
		left: '50%' // Left position relative to parent		
	};


	
        jQuery('.icheck1').each(function() {
            var checkboxClass = jQuery(this).attr('data-checkbox') ? jQuery(this).attr('data-checkbox') : 'icheckbox_minimal-grey';
            var radioClass = jQuery(this).attr('data-radio') ? jQuery(this).attr('data-radio') : 'iradio_minimal-grey';

            if (checkboxClass.indexOf('_line') > -1 || radioClass.indexOf('_line') > -1) {
                jQuery(this).iCheck({
                    checkboxClass: checkboxClass,
                    radioClass: radioClass,
                    insert: '<div class="icheck_line-icon"></div>' + jQuery(this).attr("data-label")
                });
            } else {
                jQuery(this).iCheck({
                    checkboxClass: checkboxClass,
                    radioClass: radioClass
                });
            }
        });

	
	jQuery(".navigacion").change(function()	{
	    document.location.href = jQuery(this).val();
	});

   	var target = document.getElementById('foo');


		jQuery("#fecha_nac").dateDropdowns({
					submitFieldName: 'fecha_nac', //Especificar el "atributo name" para el campo que esta oculto
					submitFormat: "dd-mm-yyyy", //Especificar el formato que la fecha tendra para enviar
					displayFormat:"dmy", //orden en que deben ser prestados los campos desplegables. "dia, mes, año"
					//initialDayMonthYearValues:['Día', 'Mes', 'Año'],
					yearLabel: 'Año', //Identifica el menú desplegable "Año"
					monthLabel: 'Mes', //Identifica el menú desplegable "Mes"
					dayLabel: 'Día', //Identifica el menú desplegable "Día"
					monthLongValues: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthShortValues: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					daySuffixes: false,  //que no tengan sufijo
					minAge:18, //edad minima
					maxAge:150, //edad maxima

				});

   	//https://github.com/IckleChris/jquery-date-dropdowns
/*
	jQuery('.input-group.date.nac').datepicker({
		//startView: 2,
		format: "dd-mm-yyyy",
	    language: "es",
	    autoclose: true,
	    todayHighlight: true

	});

	jQuery("#fecha_nac").inputmask("99-99-9999", {
            "placeholder": "dd-mm-yyyy",
            //clearMaskOnLostFocus: true
            //'autoUnmask' : true
    });*/

    //Inputmask.unmask("23/03/1973", { alias: "dd/mm/yyyy"}); //23031973



	jQuery('.input-group.date.compra').datepicker({
		//startView: 2,
		
		format: "mm/dd/yy",
		startDate: "04/10/2017", //"-2d"
		endDate: "+0d", 
	    language: "es",
	    autoclose: true,
	    todayHighlight: true

	});



	//gestion de usuarios (crear, editar y eliminar )
	jQuery('body').on('submit','#form_participantes', function (e) {	


		jQuery('#foo').css('display','block');
		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				if(data != true){
					
					spinner.stop();
					jQuery('#foo').css('display','none');
					
					jQuery('#msg_ticket').html(data.ticket);
					jQuery('#msg_compra').html(data.compra);
					jQuery('#msg_folio').html(data.folio);
  				    jQuery('#msg_general').html(data.general);
				


				}else{


						spinner.stop();
						jQuery('#foo').css('display','none');

						var url = "/proc_modal_instrucciones";
						jQuery('#modalMessage').modal({
						  	show:'true',
							remote:url,
						}); 	

						/*
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
						*/






				}
			} 
		});
		return false;
	});	

jQuery("body").on('hide.bs.modal','#modalMessage[ventana="redi_ticket"]',function(e){	
	//alert('asdasdasdas');
	$catalogo = jQuery(this).attr('valor'); //e.target.name;
	window.location.href = '/'+$catalogo;						    
});





	//gestion de usuarios (crear, editar y eliminar )
	jQuery('body').on('submit','#form_reg_participantes', function (e) {	


		jQuery('#foo').css('display','block');
		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				if(data != true){
					
					spinner.stop();
					jQuery('#foo').css('display','none');
					
					jQuery('#msg_nombre').html(data.nombre);
					jQuery('#msg_apellidos').html(data.apellidos);
					jQuery('#msg_nick').html(data.nick);
					jQuery('#msg_email').html(data.email);
					jQuery('#msg_id_estado').html(data.id_estado);
					jQuery('#msg_pass_1').html(data.pass_1);
					jQuery('#msg_pass_2').html(data.pass_2);					

					jQuery('#msg_celular').html(data.celular);					
					jQuery('#msg_telefono').html(data.telefono);					
					jQuery('#msg_coleccion_id_aviso').html(data.coleccion_id_aviso);					
					jQuery('#msg_coleccion_id_base').html(data.coleccion_id_base);					
					jQuery('#msg_fecha_nac').html(data.fecha_nac);					
					jQuery('#msg_general').html(data.general);
				

				}else{
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
				}
			} 
		});
		return false;
	});	



  	jQuery("#ticket").inputmask("9999 9999 9999 9999 9999 999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
    });

 	

	jQuery('body').on('submit','#form_registrar_ticket', function (e) {	


		jQuery('#foo').css('display','block');
		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				if(data != true){

					
					spinner.stop();
					jQuery('#foo').css('display','none');
					jQuery('#msg_general').html(data.general);
					/*
					jQuery('#messages').css('display','block');
					jQuery('#messages').addClass('alert-danger');
					jQuery('#messages').html(data);
					jQuery('html,body').animate({
						'scrollTop': jQuery('#messages').offset().top
					}, 1000);*/
				}else{
					
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
				}
			} 
		});
		return false;
	});	


//logueo y recuperar contraseña
	jQuery("#form_logueo_participante").submit(function(e){
		jQuery('#foo').css('display','block');

		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				
				if(data != true){
					spinner.stop();
					jQuery('#foo').css('display','none');

		
					jQuery('#msg_email').html(data.email);
					jQuery('#msg_contrasena').html(data.contrasena);
  				    jQuery('#msg_general').html(data.general);
				

					
				}else{
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
				}
			} 
		});
		return false;
	});







		//para cerrar de compartir facebook
		jQuery('body').on('click','#deleteUserSubmit', function (e) {	
			$catalogo = e.target.name;
			window.location.href = '/'+$catalogo;	
		});


		//para cuando oculte el compartir facebook, de un click fuera
		jQuery("body").on('hide.bs.modal','#modalMessage[ventana="redireccion"]',function(e){	
			$catalogo = jQuery(this).attr('valor'); //e.target.name;
			window.location.href = '/'+$catalogo;						    
		});	



		//para la modal de las instrucciones
		jQuery('body').on('submit','#form_sino', function (e) {	
			jQuery('#foo').css('display','block');

			var spinner = new Spinner(opts).spin(target);

			jQuery(this).ajaxSubmit({
				success: function(data){
					
					if(data != true){
						spinner.stop();
						jQuery('#foo').css('display','none');
						jQuery('#messages').css('display','block');
						jQuery('#messages').addClass('alert-danger');
						jQuery('#messages').html(data);
						jQuery('html,body').animate({
							'scrollTop': jQuery('#messages').offset().top
						}, 1000);
					}else{
							$catalogo = e.target.name;
							spinner.stop();
							jQuery('#foo').css('display','none');
							window.location.href = '/'+$catalogo;				
					}
				} 
			});
			return false;
		});

    										


});	