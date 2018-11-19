<?php
/**
 * @package CoDigital_ECommerce
 */
/*
Plugin Name: CoDigital e-commerce
Description: e-commerce object based plugin
Version: 1.0.0
Author: CoDigital (Akuma)
Author URI: https://www.codigital.com.ar/
License: GPL2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: codigital

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

/**
 * Por razones de seguridad
 */
defined('ABSPATH') or die('No se han cumplido las condiciones necesarias 1');

if(!function_exists('add_action')){
    echo 'No se han cumplido las condiciones necesarias 2';
    exit;
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


use Inc\Base\Activate;
function cds_activate_plugin(){
    Activate::activate();
}
register_activation_hook(__FILE__, 'cds_activate_plugin');

use Inc\Base\Deactivate;
function cds_deactivate_plugin(){
    Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'cds_deactivate_plugin');


if (class_exists('Inc\\Init')){
    Inc\Init::register_services();
}

