<?php

namespace Inc\Service;

class ServiceHelper{
    public static function generate_column_str($name, $data_type, $data_length, $default, $nullable, $auto_increment){
        if(!isset($name) || !isset($data_type) || empty($name) || empty($data_type)) return "";

        $column = $name . " " . $data_type;

        if(isset($data_length) && !empty($data_length))
            $column .= "($data_length)";

        if(isset($nullable) && !$nullable)
            $column .= " NOT NULL";

        if(isset($default) && !empty($default))
            $column .= " DEFAULT $default";

        if(isset($auto_increment) && $auto_increment)
            $column .= " AUTO_INCREMENT";

        return $column;
    }

    public static function create_table($table_name, $columns, $constraints){
        global $wpdb;

        $query = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix.$table_name."(";
        foreach ($columns as $column) {
            $query .= " $column,";
        }

        $query .= " $constraints)";
        $query .= $wpdb->get_charset_collate();

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($query);
    }
}