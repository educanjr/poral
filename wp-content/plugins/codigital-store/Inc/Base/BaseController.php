<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 10:53 PM
 */

namespace Inc\Base;


class BaseController
{
    public $plugin_base_name;
    public $plugin_path;
    public $plugin_name;
    public $plugin_url;

    public function __construct(){
        $this->plugin_base_name = plugin_basename(dirname(__FILE__, 3));
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_name = $this->plugin_base_name.'/codigital-store.php';
    }

    protected static function basic_form_validation($nonce_action, $nonce_field){
        if(!isset($_POST[$nonce_field])
            || !wp_verify_nonce($_POST[$nonce_field], $nonce_action)){
            return 1;
        }

        if(!isset($_POST['form_action'])
            || ($_POST['form_action'] != 'add' && $_POST['form_action'] != 'mod'
                && $_POST['form_action'] != 'del') && $_POST['form_action'] != 'sort'
                && $_POST['form_action'] != 'load'){
            return 2;
        }

        if(($_POST['form_action'] == 'mod' || $_POST['form_action'] == 'del')
            && (!isset($_POST['id']) || empty($_POST['id'])))
            return 3;

        if($_POST['form_action'] == 'sort'
            && (!isset($_POST['gen_order']) || empty($_POST['gen_order'])))
            return 3;

        return 0;
    }
}