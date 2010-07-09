<?php
/* 
 * ID (integer) The post ID
 * post_author (integer) The post author's ID
 * post_date (string) The datetime of the post (YYYY-MM-DD HH:MM:SS)
 * post_date_gmt (string) The GMT datetime of the post (YYYY-MM-DD HH:MM:SS)
 * post_content (string) The post's contents
 * post_title (string) The post's title
 * post_category (integer) The post category's ID. Note that this will always be 0 (zero) from wordpress 2.1 onwards. To determine a post's category or categories, use get_the_category().
 * post_excerpt (string) The post excerpt
 * post_status (string) The post status (publish|pending|draft|private|static|object|attachment|inherit|future)
 * comment_status (string) The comment status (open|closed|registered_only)
 * ping_status (string) The pingback/trackback status (open|closed)
 * post_password (string) The post password
 * post_name (string) The post's URL slug
 * to_ping (string) URLs to be pinged
 * pinged (string) URLs already pinged
 * post_modified (string) The last modified datetime of the post (YYYY-MM-DD HH:MM:SS)
 * post_modified_gmt (string) The last modified GMT datetime of the post (YYYY-MM-DD HH:MM:SS)
 * post_content_filtered (string)
 * post_parent (integer) The parent post's ID (for attachments, etc)
 * guid (string) A link to the post. Note: One cannot rely upon the GUID to be the permalink (as it previously was in pre-2.5), Nor can you expect it to be a valid link to the post. It's mearly a unique identifier, which so happens to be a link to the post at present.
 * menu_order (integer)
 * post_type (string) (post|page|attachment)
 * post_mime_type (string) Mime Type (for attachments, etc)
 * comment_count (integer) Number of comments
 * 
 */

/**
 * Description of TPost
 *
 * @author yohan
 */
require_once dirname(__FILE__).'/../TModel.php';

class TPost extends TModel
{
    private $_post=NULL;

    public function setAsCurrentPost()
    {
        return setup_postdata($this->_post);
    }
    
    protected function loadValue($field)
    {
        if($this->_post===NULL)
                return NULL;

        return $this->_post->$field;
    }

    public function loadPost($thePost)
    {
        $this->_post=$thePost;
    }


    public function getid()
    {
        return $this->loadValue('id');
    }
    
    public function getAuthor()
    {
        return get_userdata($this->authorID);
    }

    public function getAuthorID()
    {
        return $this->loadValue('author');
    }

    public function getDatePosted()
    {
        return $this->loadValue('posted_date');
    }

    public function getDatePostedGMT()
    {
        return $this->loadValue('posted_date_gmt');
    }

    public function getContent()
    {
         return $this->loadValue('post_content');
    }

    public function getTitle()
    {
         return $this->loadValue('post_title');
    }

    public function getExcerpt()
    {
         return $this->loadValue('post_excerpt');
    }

    public function getStatus()
    {
         return $this->loadValue('post_status');
    }

    public function getCommentStatus()
    {
         return $this->loadValue('comment_status');
    }

    public function getPingStatus()
    {
         return $this->loadValue('ping_status');
    }

    public function getPassword()
    {
         return $this->loadValue('post_password');
    }

    public function getSlug()
    {
         return $this->loadValue('post_name');
    }

    public function getPingUrl()
    {
         return $this->loadValue('to_ping');
    }

    public function getPinged()
    {
         return $this->loadValue('pinged');
    }

    public function getModified()
    {
         return $this->loadValue('post_modified');
    }

    public function getModifiedGMT()
    {
         return $this->loadValue('post_modified_gmt');
    }

    public function getFilteredContent()
    {
         return $this->loadValue('post_content_filtered');
    }

    public function getParent()
    {
        return self::find($this->loadValue('post_parent'));
    }

    public function getParentID()
    {
         return $this->loadValue('post_parent');
    }

    public function getGuid()
    {
         return $this->loadValue('guid');
    }

    public function getMenuOrder()
    {
         return $this->loadValue('menu_order');
    }

    public function getType()
    {
         return $this->loadValue('post_type');
    }

    public function getMimeType()
    {
        return $this->loadValue('post_mime_type');
    }

    public function getCommentCount()
    {
        return $this->loadValue('comment_count');
    }

    public function getCategories($args=array())
    {
        return wp_get_post_categories( $this->id, $args );
    }

    public function getTags($args=array())
    {
        return wp_get_post_tags( $this->id, $args );
    }

    public function getTaxonomies($taxonomy='post_tag', $args=array())
    {
        return wp_get_post_terms( $this->id, $taxonomy, $args );
    }

    public function getCustomFields()
    {
        return get_post_custom($this->id);
    }

    public function getCustomKeys()
    {
        return get_post_custom_keys($this->id);
    }

    public function getCustomValues($key)
    {
        return get_post_custom_values($key, $this->id);
    }
    
    /*
     * Do not include post_id in options parameter
     * Ref http://codex.wordpress.org/Function_Reference/get_comments
     */
    public function getComments($status='approve',$option=array())
    {
        $args=array_merge(array('post_id'=>$this->id,'status'=>$status),$option);
        return get_comments( $args );
    }
    
    public static function find($id)
    {
        $thePost=get_post( $id);
        if(!empty($thePost))
        {
            $tpost=new self;
            $tpost->_post=$thePost;
            return $tpost;
        }
        return NULL;
    }

    /*
     * see http://codex.wordpress.org/Template_Tags/query_posts & http://codex.wordpress.org/Template_Tags/get_posts for paramenters
     */
    public static function findAll($args=NULL)
    {
        $thePosts=get_posts($args);
        if($thePosts)
        {
            $postList=array();
            foreach($thePosts as $thePost)
            {
                $postItem=new TPost;
                $postItem->loadPost($thePost);
                $postList[]=$postItem;
            }
            return $postList;
        }
        
        return NULL;
    }
}
?>
