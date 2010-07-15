<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TView
 *
 * @author yohan
 */
require_once dirname(__FILE__).'/TBase.php';

class TView extends TBase
{
    const THEMEDEFAULT='default';

    public $_activeTheme='default';
    
    public function renderFile($_viewFile_,$_data_=null,$_return_=false)
    {
            // we use special variable names here to avoid conflict when extracting data
            if(is_array($_data_))
                    extract($_data_,EXTR_PREFIX_SAME,'data');
            else
                    $data=$_data_;
            if($_return_)
            {
                    ob_start();
                    ob_implicit_flush(false);
                    require($_viewFile_);
                    return ob_get_clean();
            }
            else
                    require($_viewFile_);
    }

    public function render($_viewName,$_data_=null,$_return_=false, $path=NULL)
    {
        if($path===NULL)
            $path=$this->getActiveThemeDirectory();
        $viewFile=$this->getViewPath($path,$_viewName);
        if($_return_)
            return $this->renderFile($viewFile,$_data_,$_return_);
        else
            $this->renderFile($viewFile,$_data_,$_return_);
    }

    protected function getViewPath($path,$view)
    {
        $viewFile=$path.$view.'.php';
        if(is_file($viewFile))
            return $viewFile;
        else
        {
            $viewFile=$this->getThemesDirectory().self::THEMEDEFAULT.$view;
            if(is_file($viewFile))
                return $viewFile;
            else
                throw new Exception("The view file '".$view.".php' doesn't exist!");
        }

    }

    public function getThemesDirectory()
    {
        return dirname(__FILE__).'/../childthemes/';
    }
    
    public function getActiveThemeDirectory()
    {
        return $this->getActiveThemeDirectory().$this->_activeTheme.'/';
    }
}
?>
