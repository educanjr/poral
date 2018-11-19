<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 11:08 PM
 */

namespace Inc\API;

class SettingsApi
{
    public $admin_pages = array();
    public $admin_sub_pages = array();

    public function register(){
        if(!empty($this->admin_pages)){
            add_action('admin_menu', array($this, 'add_admin_menu'));
        }
    }

    function add_admin_menu(){
        foreach ($this->admin_pages as $adminn_page) {
            add_menu_page($adminn_page['page_title'], $adminn_page['menu_title'], $adminn_page['capability'], $adminn_page['menu_slug'],
                $adminn_page['callback'], $adminn_page['icon_url'], $adminn_page['position']);
        }

        foreach ($this->admin_sub_pages as $admin_sub_page) {
            add_submenu_page($admin_sub_page['parent_slug'], $admin_sub_page['page_title'], $admin_sub_page['menu_title'], $admin_sub_page['capability'],
                $admin_sub_page['menu_slug'], $admin_sub_page['callback']);
        }
    }

    public function add_pages(array $pages){
        $this->admin_pages = $pages;
        return $this;
    }

    /**
     * @param array $pages array of pages, page: array('menu_slug' => 'parent_slug', 'title' => 'subpage_title')
     * @return $this
     */
    public function with_sub_pages(array $pages){
        if(empty($this->admin_pages)) return $this;

        $sub_pages = array();
        foreach ($pages as $page) {
            if(!isset($page['menu_slug']) || empty($page['menu_slug'])) continue;

            $parent_key = array_search($page['menu_slug'], array_column($this->admin_pages, 'menu_slug'));
            $parent_page = $this->admin_pages[$parent_key];

            $sub_pages[] = array(
                'page_title' => empty($page['title']) ? $parent_page['page_title'] : $page['title'],
                'menu_title' => empty($page['title']) ? $parent_page['menu_title'] : $page['title'],
                'parent_slug' => $page['menu_slug'],
                'capability' => $parent_page['capability'],
                'menu_slug' => $parent_page['menu_slug'],
                'callback' => $parent_page['callback']
            );
        }

        $this->admin_sub_pages = array_merge($this->admin_sub_pages, $sub_pages);
        return $this;
    }

    public function add_sub_pages(array $pages){
        $this->admin_sub_pages = array_merge($this->admin_sub_pages, $pages);
        return $this;
    }

}