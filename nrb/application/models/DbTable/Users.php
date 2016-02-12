<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    
    protected $_name = 'users';

    public function loginUser($email_id, $password)
    {
        
        if ($email_id && $password)
        {
            $user->email_id = $email_id;
            $user->password = $password;
            $user->save ();
            return $user;
        }
        else
        {
            throw new Zend_Exception ( "Couldnot get the data" );
        }
    }

}

