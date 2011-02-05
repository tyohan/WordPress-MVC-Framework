<?php
/**
 * Base class of WpMvc Framework that provide autoloading on core components
 *
 * @author yohan
 */

require_once dirname(__FILE__).'/TBase.php';
class WpMvc extends TBase
{

    static $_instance;
    private $_view;
    private $_request;



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
            $base=dirname(__FILE__).'/base';
            $collections=dirname(__FILE__).'/collections';
            set_include_path(get_include_path() . PATH_SEPARATOR . $root);
            set_include_path(get_include_path() . PATH_SEPARATOR . $models);
            set_include_path(get_include_path() . PATH_SEPARATOR . $base);
            set_include_path(get_include_path() . PATH_SEPARATOR . $collections);
        }

        return self::$_instance;
    }

    public static function init()
    {
        add_action('template_redirect', 'router');
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
    public function getRequest()
    {
        if(!$this->_request instanceof TRequest)
        {
            $this->_request=new TRequest;
        }
        return $this->_request;
    }
}

function router() {
    WpMvc::app()->request->route();
}


function __autoload($className)
{
    $root=dirname(__FILE__);
    $base=dirname(__FILE__).'/base';
    $models=dirname(__FILE__).'/models';
    $collections=dirname(__FILE__).'/collections';
    if(is_file($root.'/'.$className.'.php'))
        require_once $root.'/'.$className.'.php';
    elseif(is_file($base.'/'.$className.'.php'))
        require_once $base.'/'.$className.'.php';
    elseif(is_file($models.'/'.$className.'.php'))
        require_once $models.'/'.$className.'.php';
    elseif(is_file($collections.'/'.$className.'.php'))
        require_once $collections.'/'.$className.'.php';


}
?>
