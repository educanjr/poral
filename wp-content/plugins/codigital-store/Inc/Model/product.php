<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/15/2018
 * Time: 10:10 PM
 */

function codigital_create_product_table(){
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . "products";

    $sql = "CREATE TABLE $table_name (
              id number(9, 0) NOT NULL AUTO_INCREMENT,
              name tinytext NOT NULL,
              excerpt text NOT NULL,
              description text,
              sku tinytext NOT NULL,              
              thumbnail_id number(9, 0) NOT NULL,
              
              ofert_price number(12, 4) DEFAULT 0.0,
              use_ofertprice number(1, 0) DEFAULT 0,
              ispercent_ofertprice number(1, 0) DEFAULT 0,
              startdate_ofert datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
              enddate_ofert datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
              
              base_price number(12, 4) NOT NULL,
              quantity number(10, 0) DEFAULT 0 NOT NULL,
              control_stock number(1, 0) DEFAULT 0,
              aprove_forsale number(1, 0) DEFAULT 0,
              maxqty_tosell number(10, 0) DEFAULT 100000000 NOT NULL,
              minqty_tosell number(10, 0) DEFAULT 1 NOT NULL,
              
              cat_id number(9, 0) DEFAULT -1,
              branch_id number(9, 0) DEFAULT -1,
              providers_arr text DEFAULT '',
              is_featured number(1, 0) DEFAULT 0,
              
              PRIMARY KEY  (id)
            ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );

    $product_db_version = '1.0';
    add_option( 'codigital_product_db_version', $product_db_version );
}