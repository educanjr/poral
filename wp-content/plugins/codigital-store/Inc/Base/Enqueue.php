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
        wp_enqueue_style('codigital_adminstyle', $this->plugin_url.'assets/mystyle.css');
        wp_enqueue_script('codigital_adminscript', $this->plugin_url.'assets/myscript.js');
    }
}