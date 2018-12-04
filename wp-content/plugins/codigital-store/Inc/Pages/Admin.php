<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/18/2018
 * Time: 8:14 PM
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\API\SettingsApi;
use Inc\API\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $base_subpages = array();

    public $subpages = array();


    public function register(){
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->set_pages();
        $this->set_base_sub_pages();
        $this->set_sub_pages();

        $this->settings->add_pages($this->pages)->with_sub_pages($this->base_subpages)->add_sub_pages($this->subpages)->register();
    }

    public function set_pages(){
        $this->pages = [
            [
                'page_title' => 'Tienda',
                'menu_title' => 'Tienda',
                'capability' => 'manage_options',
                'menu_slug' => 'cds_store_settings',
                'icon_url' => 'dashicons-store',
                'callback' => array($this->callbacks, 'admin_settings'),
                'position' => 110
            ],
            [
                'page_title' => 'Productos',
                'menu_title' => 'Productos',
                'capability' => 'manage_options',
                'menu_slug' => 'cds_store_products',
                'icon_url' => 'dashicons-store',
                'callback' => array($this->callbacks, 'admin_products'),
                'position' => 9
            ]
        ];
    }

    public function set_base_sub_pages(){
        $this->base_subpages = [
            [
                'menu_slug' => 'cds_store_settings',
                'title' => 'Config.'
            ],
            [
                'menu_slug' => 'cds_store_products',
                'title' => 'Prod.'
            ]
        ];
    }

    public function set_sub_pages(){
        $this->subpages = [
            [
                'page_title' => 'Slider',
                'menu_title' => 'Slider',
                'parent_slug' => 'cds_store_settings',
                'capability' => 'manage_options',
                'menu_slug' => 'cds_store_test',
                'callback' => array($this->callbacks, 'admin_slider')
            ],
            [
                'page_title' => 'Categorías',
                'menu_title' => 'Categorías',
                'parent_slug' => 'cds_store_products',
                'capability' => 'manage_options',
                'menu_slug' => 'cds_store_cat',
                'callback' => array($this->callbacks, 'admin_categories')
            ],
            [
                'page_title' => 'Proveedores',
                'menu_title' => 'Proveedores',
                'parent_slug' => 'cds_store_products',
                'capability' => 'manage_options',
                'menu_slug' => 'cds_store_providers',
                'callback' => array($this->callbacks, 'admin_providers')
            ],
            [
                'page_title' => 'Marcas',
                'menu_title' => 'Marcas',
                'parent_slug' => 'cds_store_products',
                'capability' => 'manage_options',
                'menu_slug' => 'cds_store_branch',
                'callback' => array($this->callbacks, 'admin_branches')
            ]
        ];
    }

    public function store_settings()
    {
        require_once $this->plugin_url . 'templates/admin/store_settings.php';
    }
}