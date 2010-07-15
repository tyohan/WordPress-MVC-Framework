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

require_once dirname(__FILE__).'/TBase.php';
class WpMvc extends TBase
{
    protected static $_instance;
    private $_view;

    public static function app()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self();
            $root=dirname(__FILE__);
            $models=dirname(__FILE__).'/models';
            set_include_path(get_include_path() . PATH_SEPARATOR . $root);
            set_include_path(get_include_path() . PATH_SEPARATOR . $models);
        }

        return self::$_instance;
    }

    public static function init()
    {
        return self::app();
    }
    
    // Do not allow an explicit call of the constructor: $v = new Singleton();
    final protected function __construct() { }

    // Do not allow the clone operation: $x = clone $v;
    final protected function __clone() { }

    public function getView()
    {
        if(!$this->_view instanceof TView)
        {
            $this->_view=new TView;
        }
        return $this->_view;
    }
}

function __autoload($className)
{
    require_once $className . '.php';
}
?>
