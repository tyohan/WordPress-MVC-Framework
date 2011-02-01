<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TList
 *
 * @author yohan
 */
abstract  class TList extends TBase implements IteratorAggregate, ArrayAccess, Countable
{
    public $container;
    
    public function count()
    {
        return count($this->container);
    }

    public function  __construct($list)
    {
            $this->container=$list;
    }
   
   
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}
?>
