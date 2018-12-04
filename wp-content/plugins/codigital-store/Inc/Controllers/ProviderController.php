<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/24/2018
 * Time: 5:11 PM
 */


namespace Inc\Controllers;


use Inc\Base\BaseController;

class ProviderController extends BaseController
{
    const NONCE_ACTION = 'cdg_providers_manager';
    const NONCE_FIELD = 'cdg_provider_nonce';

    public function register(){
        if(has_action('wp_ajax_cdg_provider_action'))
            return;

        add_action( 'wp_ajax_cdg_provider_action', array($this, 'cdg_provider_action'));
    }

    public function get_all_providers(){
        $post_providers = get_posts(array(
            'post_type' => 'cdg_provider',
            'numberposts' => -1,
            'post_status' => 'any'
        ));

        $providers = array();
        foreach ($post_providers as $post_provider) {
            $img_id = get_post_meta($post_provider->ID, 'cdg_provider_img', true);
            $img_file = empty($img_id) ? '' : wp_get_attachment_url($img_id);
            $img_file = is_bool($img_file) ? '' : $img_file;

            $provider = array(
                'id' => $post_provider->ID,
                'name' => $post_provider->post_title,
                'email' => $post_provider->post_excerpt,
                'url' => $post_provider->pinged,
                'order' => $post_provider->menu_order,
                'in_slide' => $post_provider->post_status == 'draft' ? false : true,
                'img_url' => $img_file,
                'img_id' => $img_id
            );

            $providers[] = $provider;
        }

        usort($providers, function($a, $b) {
            return $a['order'] > $b['order'];
        });

        return $providers;
    }

    public static function cdg_provider_action(){
        $response = array(
            'error_msg' => '',
            'warning_msg' => '',
            'items' => '',
            'success' => false
        );

        $error = self::basic_form_validation(self::NONCE_ACTION, self::NONCE_FIELD);
        if($error != 0){
            $response['error_msg'] = "$error - No se puede procesar su petición.";
            wp_send_json( $response );
        };

        switch ($_POST['form_action']){
            case 'load':
                $response = self::cdg_load_providers($response);
                break;
            case 'add':
                $response = self::cdg_add_provider($response);
                break;
            case 'mod':
                $response = self::cdg_edit_provider($response);
                break;
            case 'del':
                $response = self::cdg_delete_provider($response);
                break;
            case 'sort':
                $response = self::cdg_sort_provider($response);
                break;
        }

        wp_send_json( $response );
    }

    protected static function cdg_add_provider($response){
        $post_provider = array(
            'post_title' => $_POST['name'],
            'post_excerpt' => $_POST['email'],
            'pinged' => $_POST['url'],
            'post_type' => 'cdg_provider',
            'menu_order' => $_POST['order'],
            'post_status' => isset($_POST['use_slide']) ? 'publish' : 'draft'
        );

        $provider = wp_insert_post($post_provider, true);
        if(is_wp_error($provider)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        if(!isset($_POST['img']) || empty($_POST['img']) || is_bool(wp_get_attachment_url($_POST['img']))){
            $updated = array(
                'ID' => $provider,
                'post_status' => 'draft'
             );
            wp_update_post($updated);

            update_post_meta($provider, 'cdg_provider_img', '');
            $response['warning_msg'] = "Provedor insertado con éxito, no se puede incluir en el slider hasta que se le adicione una imagen.";
            return $response;
        }

        update_post_meta($provider, 'cdg_provider_img', $_POST['img']);

        return $response;
    }

    protected static function cdg_edit_provider($response){
        $post_provider = array(
            'ID' => $_POST['id'],
            'post_title' => $_POST['name'],
            'post_excerpt' => $_POST['email'],
            'pinged' => $_POST['url'],
            'post_type' => 'cdg_provider',
            'menu_order' => $_POST['order'],
            'post_status' => isset($_POST['use_slide']) ? 'publish' : 'draft'
        );

        $provider = wp_update_post($post_provider, true);
        if(is_wp_error($provider)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        if(!isset($_POST['img']) || empty($_POST['img']) || is_bool(wp_get_attachment_url($_POST['img']))){
            $updated = array(
                'ID' => $provider,
                'post_status' => 'draft'
            );
            wp_update_post($updated);

            update_post_meta($provider, 'cdg_provider_img', '');
            $response['warning_msg'] = "Provedor modificado con éxito, no se puede incluir en el slider hasta que se le adicione una imagen.";
            return $response;
        }

        update_post_meta($provider, 'cdg_provider_img', $_POST['img']);

        return $response;
    }

    protected static function cdg_delete_provider($response){
        $id = $_POST['id'];

        $provider = get_post($id);
        if($provider == null){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $meta_deleted = delete_post_meta($provider->ID, 'cdg_provider_img');
        if(!$meta_deleted){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $deleted = wp_delete_post($provider->ID, true);
        if($deleted == null || is_bool($deleted)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $response['error_msg'] = "";
        $response['success'] = true;

        return $response;
    }

    protected static function cdg_sort_provider($response){
        $data = $_POST['gen_order'];
        $sort_options = explode(",", $data);
        foreach ($sort_options as $sort_option) {
            if (empty($sort_option))continue;

            $item = explode("_", $sort_option);
            $update = array(
                'ID' => $item[0],
                'menu_order' => $item[1]
            );
            $provider = wp_update_post($update, true);
            if(is_wp_error($provider)){
                $response['warning_msg'] = "Puede que uno o más provedores no se hayan ordenado de forma correcta.";
            }
        }

        return $response;
    }

    protected static function cdg_load_providers($response){
        $post_providers = get_posts(array(
            'post_type' => 'cdg_provider',
            'numberposts' => -1,
            'post_status' => 'any'
        ));

        $providers = array();
        foreach ($post_providers as $post_provider) {
            $img_id = get_post_meta($post_provider->ID, 'cdg_provider_img', true);
            $img_file = empty($img_id) ? '' : wp_get_attachment_url($img_id);
            $img_file = is_bool($img_file) ? '' : $img_file;

            $provider = array(
                'id' => $post_provider->ID,
                'name' => $post_provider->post_title,
                'email' => $post_provider->post_excerpt,
                'url' => $post_provider->pinged,
                'order' => $post_provider->menu_order,
                'in_slide' => $post_provider->post_status == 'draft' ? false : true,
                'img_url' => $img_file,
                'img_id' => $img_id
            );

            $providers[] = $provider;
        }

        usort($providers, function($a, $b) {
            return $a['order'] > $b['order'];
        });

        $response['items'] = $providers;
        $response['success'] = true;

        return $response;
    }
}