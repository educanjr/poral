<?php
namespace Inc\Service;
interface CdsGlobalService{
    public function create_table();
    public function delete_table($name);
    public function get_all_data();
    public function get_data($id);
    public function set_data();
    public function get_data_by_query($query);
}