<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 8:35 PM
 */

namespace Inc\Service;

class ProductService implements CdsGlobalService
{
    public function create_table(){
        $columns = array();
        $columns[] = ServiceHelper::generate_column_str('id', 'INT', '', '', false, true);
        $columns[] = ServiceHelper::generate_column_str('name', 'VARCHAR', '50', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('excerpt', 'TINYTEXT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('description', 'TEXT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('sku', 'VARCHAR', '50', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('base_price', 'DECIMAL', '0.00', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('qty', 'INT', '', '1', false, false);
        $columns[] = ServiceHelper::generate_column_str('control_stock', 'BIT', '', '0', false, false);
        $columns[] = ServiceHelper::generate_column_str('approved_forsale', 'BIT', '', '0', false, false);
        $columns[] = ServiceHelper::generate_column_str('thumb_id', 'INT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('cat_id', 'INT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('offer_price', 'DECIMAL', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('use_offerprice', 'BIT', '', '0', false, false);
        $columns[] = ServiceHelper::generate_column_str('ispercent_offerprice', 'BIT', '', '0', false, false);
        $columns[] = ServiceHelper::generate_column_str('startdate_offer', 'DATETIME', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('enddate_offer', 'DATETIME', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('max_qtytosell', 'INT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('min_qtytosell', 'INT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('branch_id', 'INT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('providers', 'TINYTEXT', '', '', false, false);
        $columns[] = ServiceHelper::generate_column_str('featured', 'BIT', '', '0', false, false);

        $collation = "PRIMARY KEY (id)";
        ServiceHelper::create_table('products', $columns, $collation);
    }


    public function delete_table($name)
    {
        // TODO: Implement delete_table() method.
    }

    public function get_all_data()
    {
        // TODO: Implement get_all_data() method.
    }

    public function get_data($id)
    {
        // TODO: Implement get_data() method.
    }

    public function set_data()
    {
        // TODO: Implement set_data() method.
    }

    public function get_data_by_query($query)
    {
        // TODO: Implement get_data_by_query() method.
    }
}