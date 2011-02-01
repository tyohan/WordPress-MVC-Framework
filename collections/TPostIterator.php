<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TPostIterator
 *
 * @author yohan
 */
class TPostIterator extends TIterator
{
    public  function current() {
        $thePost=$this->list[$this->position];
        $postItem=new TPost;
        $postItem->loadPost($thePost);
        $postItem->setAsCurrentPost();
        $GLOBALS['post']=$postItem->thePost;
        return $postItem;
    }
}
?>
