<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 9:27 PM
 */

namespace Inc\Base;

class Activate
{
    public static function create_post_types()
    {
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

    public static function activate()
    {
        //Activate::create_post_types();
        flush_rewrite_rules();
    }
}