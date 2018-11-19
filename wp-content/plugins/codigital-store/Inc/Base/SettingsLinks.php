<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 10:34 PM
 */

namespace Inc\Base;


class SettingsLinks extends BaseController
{
    public function register(){
        add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_links'));
    }

    public function settings_links($links){
        $settings_link = '<a href="admin.php?page=store_settings">Configuración</a>';
        array_push($links, $settings_link);
        return $links;
    }
}