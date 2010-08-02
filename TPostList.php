<?php


/**
 * Use for Post model iterator so when iterate through list of Post model, it will automatically set as current active post
 *
 * @author yohan
 */
class TPostList implements Iterator {
    private $position = 0;
    private $list;

    public function __construct($list) {
        $this->position = 0;
        $this->list=$list;
    }

    function rewind() {
        $this->position = 0;
    }

    function current() {
        $thePost=$this->list[$this->position];
        $thePost->setAsCurrentPost();
        $GLOBALS['post']=$thePost->thePost;
        return $thePost;
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
