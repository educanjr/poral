<?php
/**
 * @package CoDigital_ECommerce
 */

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//$providers = get_posts(
//    array(
//        'post_type' => 'cds_providers',
//        'numberposts' => -1
//    )
//);
//
//foreach ($providers as $provider) {
//    wp_delete_post($provider->ID, true);
//}

// REMOVE DATA FROM DATABASE
global $wpdb;
$post_table = $wpdb->prefix.'posts';
$postmeta_table = $wpdb->prefix.'postmeta';
$wpdb->query( "DELETE FROM {$post_table} WHERE post_type = 'cds_providers' AND post_type = 'cds_branches'" );
$wpdb->query( "DELETE FROM {$postmeta_table} WHERE post_id NOT IN (SELECT id FROM {$post_table})" );