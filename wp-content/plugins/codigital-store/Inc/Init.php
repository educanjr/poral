<?php
/**
 * @package CoDigital_ECommerce
 */

namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array
     */
    public static function get_general(){
        return [
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Pages\Admin::class
        ];
    }

    private static function get_services(){
        return [
            Service\ProductService::class
        ];
    }

    /**
     * Register all the classes that have the method register
     */
    public static function register_services(){
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if(method_exists($service, 'create_table')){
                $service->create_table();
            }
        }

        foreach (self::get_general() as $class) {
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }

    /**
     * create an instance of a given class
     * @param $class object class to instantiate
     * @return object
     */
    private static function instantiate($class){
        $service = new $class();
        return $service;
    }
}