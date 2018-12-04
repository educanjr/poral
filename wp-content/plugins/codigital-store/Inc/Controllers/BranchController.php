<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/24/2018
 * Time: 5:11 PM
 */


namespace Inc\Controllers;


use Inc\Base\BaseController;

class BranchController extends BaseController
{
    const NONCE_ACTION = 'cdg_branches_manager';
    const NONCE_FIELD = 'cdg_branch_nonce';

    public function register(){
        if(has_action('wp_ajax_cdg_branch_action'))
            return;

        add_action( 'wp_ajax_cdg_branch_action', array($this, 'cdg_branch_action'));
    }

    public function get_all_branches(){
        $post_branches = get_posts(array(
            'post_type' => 'cdg_branch',
            'numberposts' => -1,
            'post_status' => 'any'
        ));

        $branches = array();
        foreach ($post_branches as $post_branch) {
            $img_id = get_post_meta($post_branch->ID, 'cdg_branch_img', true);
            $img_file = empty($img_id) ? '' : wp_get_attachment_url($img_id);
            $img_file = is_bool($img_file) ? '' : $img_file;

            $branch = array(
                'img_id' => $img_id,
                'img_url' => $img_file,
                'id' => $post_branch->ID,
                'url' => $post_branch->pinged,
                'name' => $post_branch->post_title
            );

            $branches[] = $branch;
        }

        return $branches;
    }

    public static function cdg_branch_action(){
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
                $response = self::cdg_load_branches($response);
                break;
            case 'add':
                $response = self::cdg_add_branch($response);
                break;
            case 'mod':
                $response = self::cdg_edit_branch($response);
                break;
            case 'del':
                $response = self::cdg_delete_branch($response);
                break;
        }

        wp_send_json( $response );
    }

    protected static function cdg_add_branch($response){
        $post_branch = array(
            'post_status' => 'draft',
            'pinged' => $_POST['url'],
            'post_type' => 'cdg_branch',
            'post_title' => $_POST['name']
        );

        $branch = wp_insert_post($post_branch, true);
        if(is_wp_error($branch)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        if(!isset($_POST['img']) || empty($_POST['img']) || is_bool(wp_get_attachment_url($_POST['img']))){
            update_post_meta($branch, 'cdg_branch_img', '');
            return $response;
        }

        update_post_meta($branch, 'cdg_branch_img', $_POST['img']);

        return $response;
    }

    protected static function cdg_edit_branch($response){
        $post_branch = array(
            'ID' => $_POST['id'],
            'post_status' => 'draft',
            'pinged' => $_POST['url'],
            'post_type' => 'cdg_branch',
            'post_title' => $_POST['name']
        );

        $branch = wp_update_post($post_branch, true);
        if(is_wp_error($branch)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        if(!isset($_POST['img']) || empty($_POST['img']) || is_bool(wp_get_attachment_url($_POST['img']))){
            update_post_meta($branch, 'cdg_branch_img', '');
            return $response;
        }

        update_post_meta($branch, 'cdg_branch_img', $_POST['img']);
        return $response;
    }

    protected static function cdg_delete_branch($response){
        $id = $_POST['id'];

        $branch = get_post($id);
        if($branch == null){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $meta_deleted = delete_post_meta($branch->ID, 'cdg_branch_img');
        if(!$meta_deleted){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $deleted = wp_delete_post($branch->ID, true);
        if($deleted == null || is_bool($deleted)){
            $response['error_msg'] = "Ha ocurrido un error procesando su petición.";
            return $response;
        }

        $response['error_msg'] = "";
        $response['success'] = true;

        return $response;
    }

    protected static function cdg_load_branches($response){
        $post_branches = get_posts(array(
            'post_type' => 'cdg_branch',
            'numberposts' => -1,
            'post_status' => 'any'
        ));

        $branches = array();
        foreach ($post_branches as $post_branch) {
            $img_id = get_post_meta($post_branch->ID, 'cdg_branch_img', true);
            $img_file = empty($img_id) ? '' : wp_get_attachment_url($img_id);
            $img_file = is_bool($img_file) ? '' : $img_file;

            $branch = array(
                'img_id' => $img_id,
                'img_url' => $img_file,
                'id' => $post_branch->ID,
                'url' => $post_branch->pinged,
                'name' => $post_branch->post_title
            );

            $branches[] = $branch;
        }

        $response['items'] = $branches;
        $response['success'] = true;

        return $response;
    }
}