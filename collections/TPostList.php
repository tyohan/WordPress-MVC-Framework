<?php


/**
 * Use for Post model iterator so when iterate through list of Post model, it will automatically set as current active post
 *
 * @author yohan
 */
class TPostList extends TList
{
    public function  getIterator()
    {
        return new TPostIterator($this->container);
    }
}
?>
