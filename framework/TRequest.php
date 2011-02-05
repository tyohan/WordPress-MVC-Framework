<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TRequest
 *
 * @author yohan
 */
class TRequest extends TBase
{
    public function hasController($filepath)
    {
        if(is_file($filepath))
            return TRUE;
        else
            return FALSE;
    }
    
    public function route()
    {
        $name=isset($_GET['r'])?$_GET['r']:NULL;
        if($name===NULL)
            return FALSE;
        
        $file=__DIR__.'/../'.$name.'.php';
        $hasController=$this->hasController($file);
        if($hasController===TRUE)
        {
            include $file;
            exit;
        }
        else
            return FALSE;
    }
}

?>
