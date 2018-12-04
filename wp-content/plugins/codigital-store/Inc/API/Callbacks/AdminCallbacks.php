<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/18/2018
 * Time: 9:41 PM
 */

namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    // SETTINGS MENU SECTION CALLBACKS
    public function admin_settings(){
        return require_once ("$this->plugin_path/templates/admin/store_settings.php");
    }

    public function admin_slider(){
        return require_once ("$this->plugin_path/templates/admin/store_slider.php");
    }

    // PRODUCTS MENU SECTION CALLBACKS
    public function admin_products(){
        return require_once ("$this->plugin_path/templates/admin/store_products.php");
    }

    public function admin_categories(){
        return require_once ("$this->plugin_path/templates/admin/store_cat.php");
    }

    public function admin_providers(){
        return require_once ("$this->plugin_path/templates/admin/store_providers.php");
    }

    public function admin_branches(){
        return require_once ("$this->plugin_path/templates/admin/store_branches.php");
    }
}