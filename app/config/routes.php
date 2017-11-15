<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




$route['default_controller']   = 'home/index';
$route['404_override'] 		   = '';


//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////Registro de usuarios//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

$route['registro_usuario']        = 'registro/nuevo_registro';
$route['validar_registros']        = 'registro/validar_registros';

$route['ingresar_usuario']        = 'registro/ingresar_usuario';
$route['validar_login_participante']        = 'registro/validar_login_participante';

$route['recuperar_participante']			= 'registro/recuperar_participante';
$route['validar_recuperar_participante']	= 'registro/validar_recuperar_participante';

$route['desconectar']							= 'registro/desconectar_participante';



$route['registro_ticket']        = 'registro/registro_ticket';
$route['validar_tickets']	= 'registro/validar_tickets';

$route['proc_modal_juego']							= 'registro/proc_modal_juego';
$route['proc_modal_felicidades']							= 'registro/proc_modal_felicidades'; 


$route['proc_modal_facebook']							= 'registro/proc_modal_facebook'; 


$route['registrar_facebook/(:any)']								= 'registro/registrar_facebook/$1';

//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////Juegos//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

//
$route['tarjetas']								    = 'home/tarjetas';
$route['respuesta_tarjeta']							= 'home/respuesta_tarjeta';

$route['juegos']								    = 'home/juegos';
$route['respuesta_juego']							= 'home/respuesta_juego';


$route['record/(:any)']								= 'home/record/$1';



////////////////////////////////////////////////////////////////////




$route['mecanica']							= 'home/mecanica';
$route['facebook']							= 'home/facebook';

$route['aviso']							= 'home/aviso';
$route['legales']							= 'home/legales';
$route['eleccion_premio']							= 'home/eleccion_premio';




//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////Administracion//////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

$route['admin']							= 'main/index';
$route['login']							= 'main/login';


$route['usuarios']						= 'main/listado_usuarios';
$route['procesando_usuarios']			= 'main/procesando_usuarios';


	/* necesita server de correo, para que notifique quien se da de alta*/
$route['nuevo_usuario']                 = 'main/nuevo_usuario';
$route['validar_nuevo_usuario']         = 'main/validar_nuevo_usuario';

$route['actualizar_perfil']		         = 'main/actualizar_perfil';
$route['editar_usuario/(:any)']			= 'main/actualizar_perfil/$1';
$route['validacion_edicion_usuario']    = 'main/validacion_edicion_usuario';

$route['eliminar_usuario/(:any)']		= 'main/eliminar_usuario/$1';
$route['validar_eliminar_usuario']    = 'main/validar_eliminar_usuario';

$route['exportar_reportes']    = 'exportar_reportes/exportar';


$route['salir']							= 'main/logout';

$route['validar_login']					= 'main/validar_login';


//recuperar contraseña /* necesita server de correo*/
$route['recuperar_contrasena']			= 'main/recuperar_contrasena';
$route['validar_recuperar_password']	= 'main/validar_recuperar_password';

//historicos de accesos
$route['historico_accesos']                 = 'main/historico_accesos';
$route['procesando_historico_accesos']      = 'main/procesando_historico_accesos';

	//solo faltan este modulo			
			//respaldar informacion	
			$route['respaldar']					= 'respaldo/respaldar';




//participantes
$route['participantes']						= 'main/listado_participantes';
$route['procesando_participantes']			= 'main/procesando_participantes';

//detalle de los participantes
$route['detalle_participante/(:any)']			    = 'main/detalle_participante/$1';
$route['procesando_detalle_participantes']			= 'main/procesando_detalle_participantes';


//historicos de participantes
$route['historico_participantes']                 = 'main/historico_participantes';
$route['procesando_historico_participantes']      = 'main/procesando_historico_participantes';


//historicos de participantes
$route['listado_completo']                 = 'main/listado_completo';
$route['procesando_listado_completo']      = 'main/procesando_listado_completo';
