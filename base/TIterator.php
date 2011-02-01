<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TIterator
 *
 * @author yohan
 */
abstract  class TIterator implements Iterator
{
    public function __construct($list) {
        $this->position = 0;
        $this->list=$list;
    }

    function rewind() {
        $this->position = 0;
    }


    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return isset($this->list[$this->position]);
    }
}
?>
