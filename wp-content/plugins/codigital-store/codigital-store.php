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



class CoDigitalStore
{
    public $plugin_name;

    public function __construct()
    {
        add_action('init', array($this, 'create_post_types'));
        $this->plugin_name = plugin_basename(__FILE__);
    }

    function register(){
        //admin_enqueue_scripts();

        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin_name", array($this, 'setting_link'));
    }

    function activate(){
        //$this->create_post_types();
        flush_rewrite_rules();
    }

    function deactivate(){
        flush_rewrite_rules();
    }

    public function create_post_types(){
        register_post_type('cds-providers',
            array(
                'labels' => array(
                    'name' => 'Proveedores',
                    'singular_name' => 'Proveedor'
                ),
                'public' => true,
                'has_archive' => true,
                'show_in_menu' => 'edit.php'
            ));
        //register_post_type('cds_branches', ['public' => 'true', 'label' => 'Marcas']);
    }

    public function admin_enqueue_scripts(){

    }

    public function add_admin_pages(){
        add_menu_page('Tienda', 'Tienda', 'manage_options', 'cds_store_settings',
            array($this, 'store_settings'), 'dashicons-store', 110);
    }

    public function store_settings(){
        require_once plugin_dir_path(__FILE__) . 'templates/admin/store_settings.php';
    }

    public function setting_link($links){
        $settings = '<a href="admin.php?page=cds_store_settings">Configuración</a>';
        array_push($links, $settings);
        return $links;
    }
}


$coDigitalStore = new CoDigitalStore();
$coDigitalStore->register();

// activation
register_activation_hook(__FILE__, array($coDigitalStore, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($coDigitalStore, 'deactivate'));
