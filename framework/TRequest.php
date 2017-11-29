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
        return is_file($filepath);
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
