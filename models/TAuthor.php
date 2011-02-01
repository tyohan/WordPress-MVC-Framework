<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TAuthor
 *
 * @author yohan
 */
class TAuthor extends TModel
{
    private $_id;
   
    private $_user;
    
    
    public function  __construct($userID)
    {
        $this->_id=$userID;
    }
    
    protected function getUser()
    {
        if($this->_user===NULL)
            $this->_user=get_userdata( $this->_id );
        return $this->_user;
    }

    public function getAvatar($size=32)
    {
        return get_avatar($this->user->user_email, $size);

    }

    
    public function __get($name)
    {
        $getter='get'.$name;
        if(method_exists($this,$getter))
                return $this->$getter();
        elseif(isset($this->user->$name))
                return $this->user->$name;
        throw new Exception('Property "{class}.{property}" is not defined.');

    }


}
?>
