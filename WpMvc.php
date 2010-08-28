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

    static $_instance;
    private $_view;



    public function setTheme($theme)
    {
        self::app()->view->_activeTheme=$theme;
    }
    public function getTheme()
    {
        return self::app()->view->_activeTheme;
    }

    public function getThemeUrl()
    {
        return get_bloginfo('template_url').'/childthemes/'.$this->theme;
    }
    
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
    $root=dirname(__FILE__);
    $models=dirname(__FILE__).'/models';
    if(is_file($root.'/'.$className.'.php'))
        require_once $root.'/'.$className.'.php';
    elseif(is_file($models.'/'.$className.'.php'))
        require_once $models.'/'.$className.'.php';


}
?>
