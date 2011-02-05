<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TCategory
 * TCategory properties
 * cat_ID
 * the category id (also stored as 'term_id')
 * cat_name
 * the category name (also stored as 'name')
 * category_nicename
 * a slug generated from the category name (also stored as 'slug')
 * category_description
 * the category description (also stored as 'description')
 * category_parent
 * the category id of the current category's parent. '0' for no parents. (also stored as 'parent')
 * category_count
 * the number of uses of this category (also stored as 'count')
 * @author yohan
 */
class TCategory extends TModel
{
    private $_category;
    
    protected function getID()
    {
        return $this->_category->cat_id;
    }
    public static function findAll($args)
    {
        $cats=get_categories( $args );
        $catObjects=array();
        foreach($cats as $cat)
        {
            $catObjects[]=new TCategory($cat);
        }
        return $catObjects;
    }

    public static function find($postID)
    {
        $cat=get_the_category($postID);
        if(empty($cat))
            return NULL;
        return new TCategory($cat);
    }

    protected function getPosts()
    {
        return TPost::findAll('cat='.$this->id);
    }

    public function isInThisCategory($postid)
    {
        return in_category($this->id, $postid);
    }
}
?>
