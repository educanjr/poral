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
    public $plugin_path;
    public $plugin_name;
    public $plugin_url;

    public function __construct(){
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_name = plugin_basename(dirname(__FILE__, 3).'/codigital-store.php');
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
    }
}