<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/24/2018
 * Time: 5:11 PM
 */


namespace Inc\Controllers;


use Inc\Base\BaseController;

class CategoryController extends BaseController
{
    const NONCE_ACTION = 'cdg_categories_manager';
    const NONCE_FIELD = 'cdg_category_nonce';

    public function register(){
        if(has_action('wp_ajax_cdg_category_action'))
            return;

        add_action( 'wp_ajax_cdg_category_action', array($this, 'cdg_category_action'));
    }

    public function get_all_categories(){
        $post_categories = get_posts(array(
            'post_type' => 'cdg_category',
            'numberposts' => -1,
            'post_status' => 'any'
        ));

        $categories = array();
        foreach ($post_categories as $post_category) {
            $img_id = get_post_meta($post_category->ID, 'cdg_category_img', true);
            $img_file = empty($img_id) ? '' : wp_get_attachment_url($img_id);
            $img_file = is_bool($img_file) ? '' : $img_file;

            $category = array(
                'img_id' => $img_id,
                'img_url' => $img_file,
                'id' => $post_category->ID,
                'name' => $post_category->post_title,
                'description' => $post_category->post_excerpt
            );

            $categories[] = $category;
        }

        return $categories;
    }

    public static function cdg_category_action(){
        $response = array(
            'error_msg' => '',
            'items' => array(),
            'success' => false,
            'warning_msg' => ''
        );

        //wp_send_json( $response );

        $error = self::basic_form_validation(self::NONCE_ACTION, self::NONCE_FIELD);
        if($error != 0){
            $response['error_msg'] = "$error - No se puede procesar su petición.";
            wp_send_json( $response );
        };

        switch ($_POST['form_action']){
            case 'load':
                $response = self::cdg_load_categories($response);
                break;
            case 'add':
                $response = self::cdg_add_category($response);
                break;
            case 'mod':
                $response = self::cdg_edit_category($response);
                break;
            case 'del':
                $response = self::cdg_delete_category($response);
                break;
        }

        wp_send_json( $response );
    }

    protected static function cdg_add_category($response){
        $post_category = array(
            'post_status' => 'draft',
            'post_type' => 'cdg_category',
            'post_title' => $_POST['name'],
            'post_excerpt' => $_POST['description'],
        );

        $category = wp_insert_post($post_category, true);
        if(is_wp_error($category)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        if(!isset($_POST['img']) || empty($_POST['img']) || is_bool(wp_get_attachment_url($_POST['img']))){
            update_post_meta($category, 'cdg_category_img', '');
            return $response;
        }

        update_post_meta($category, 'cdg_category_img', $_POST['img']);

        return $response;
    }

    protected static function cdg_edit_category($response){
        $post_category = array(
            'ID' => $_POST['id'],
            'post_status' => 'draft',
            'post_type' => 'cdg_category',
            'post_title' => $_POST['name'],
            'post_excerpt' => $_POST['description'],
        );

        $category = wp_update_post($post_category, true);
        if(is_wp_error($category)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        if(!isset($_POST['img']) || empty($_POST['img']) || is_bool(wp_get_attachment_description($_POST['img']))){
            update_post_meta($category, 'cdg_category_img', '');
            return $response;
        }

        update_post_meta($category, 'cdg_category_img', $_POST['img']);
        return $response;
    }

    protected static function cdg_delete_category($response){
        $id = $_POST['id'];

        $category = get_post($id);
        if($category == null){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $meta_deleted = delete_post_meta($category->ID, 'cdg_category_img');
        if(!$meta_deleted){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $deleted = wp_delete_post($category->ID, true);
        if($deleted == null || is_bool($deleted)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $response['error_msg'] = "";
        $response['success'] = true;

        return $response;
    }

    protected static function cdg_load_categories($response){
        $post_categories = get_posts(array(
            'post_type' => 'cdg_category',
            'numberposts' => -1,
            'post_status' => 'any'
        ));

        $categories = array();
        foreach ($post_categories as $post_category) {
            $img_id = get_post_meta($post_category->ID, 'cdg_category_img', true);
            $img_file = empty($img_id) ? '' : wp_get_attachment_url($img_id);
            $img_file = is_bool($img_file) ? '' : $img_file;

            $category = array(
                'img_id' => $img_id,
                'img_url' => $img_file,
                'id' => $post_category->ID,
                'name' => $post_category->post_title,
                'description' => $post_category->post_excerpt
            );

            $categories[] = $category;
        }

        $response['items'] = $categories;
        $response['success'] = true;

        return $response;
    }
}