<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 11/17/2018
 * Time: 9:27 PM
 */

namespace Inc\Base;

class Deactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}