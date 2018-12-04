<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 10:15 PM
 */

namespace Inc\Base;


class Enqueue extends BaseController
{
    public function register(){
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
    }

    function admin_enqueue(){
        wp_enqueue_script('media-upload');
        wp_enqueue_media();

        wp_enqueue_style('codigital_uikit_style', $this->plugin_url.'assets/css/uikit.min.css');
        wp_enqueue_style('codigital_admin_style', $this->plugin_url.'assets/css/cdg_admin_style.css');

        wp_enqueue_script('codigital_uikit_script', $this->plugin_url.'assets/js/uikit.min.js');
        wp_enqueue_script('codigital_uikit-icons_script', $this->plugin_url.'assets/js/uikit-icons.min.js');

        $params = array ( 'ajaxurl' => admin_url( 'admin-ajax.php' ) );
        wp_enqueue_script('codigital_admin_script', $this->plugin_url.'assets/js/cdg_admin_script.js');
        wp_localize_script( 'codigital_admin_script', 'params', $params );
    }
}