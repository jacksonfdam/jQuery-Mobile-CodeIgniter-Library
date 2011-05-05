<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| MOBILE
| -------------------------------------------------------------------
| Libreria para utilizar jQuery Mobile dentro de CodeIgniter.
|
| Con esta libreria lo que se pretende es agilizar el proceso del
| desarrollo de páginas web destinadas a dispositivos móviles.
| jQuery Mobile tiene un gran grupo detrás y un soporte muy amplio
| por eso se ha elegido este framework para esta libreria.
|
*/

$config['mobile']['global_theme'] 	= 'b';

$config['mobile']['ajax_loaded']	= TRUE;

$config['mobile']['page_transitions'] = 'slide'; /* if ajax_loaded = TRUE */

$config['mobile']['fixed_toolbars'] = FALSE;

$config['mobile']['backbtn_auto']	= FALSE;
$config['mobile']['backbtn_text']	= 'Back';

$config['mobile']['load_from_cdn'] 	= TRUE;
