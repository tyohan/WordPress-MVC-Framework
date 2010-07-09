<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WpMvc
 *
 * @author yohan
 */
class WpMvc
{
    public function  __construct($debug=FALSE)
    {
        if($debug===TRUE)
        {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        }
        $root=dirname(__FILE__);
        $models=dirname(__FILE__).'/models';
        set_include_path(get_include_path() . PATH_SEPARATOR . $root);
        set_include_path(get_include_path() . PATH_SEPARATOR . $models);
    }
}

function __autoload($className)
{
    require_once $className . '.php';
}
?>
