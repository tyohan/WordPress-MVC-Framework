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
    public static function renderFile($_viewFile_,$_data_=null,$_return_=false)
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

    public static function render($_viewName,$_data_=null,$_return_=false, $path=NULL)
    {
        if($path===NULL)
            $path=dirname(__FILE__).'/../views/';
        $viewFile=$path.$_viewName.'.php';
        if($_return_)
            return self::renderFile($viewFile,$_data_,$_return_);
        else
            self::renderFile($viewFile,$_data_,$_return_);
    }
}
?>
