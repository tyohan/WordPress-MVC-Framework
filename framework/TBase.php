<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TBase
 *
 * @author yohan
 */
class TBase
{
    
    public function __get($name)
    {
        $getter='get'.$name;
        if(method_exists($this,$getter))
                return $this->$getter();
        throw new Exception('Property "{class}.{property}" is not defined.');

    }

    public function  __set($name, $value)
    {
        $setter='set'.$name;
        if(method_exists($this,$setter))
                return $this->$setter($value);
        if(method_exists($this,'get'.$name))
                throw new Exception ('Property "{class}.{property}" is read only.');
        else
                throw new Exception('Property "{class}.{property}" is not defined.');

    }
}
?>
