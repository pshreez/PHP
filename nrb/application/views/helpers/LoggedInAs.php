<?php

class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract
{

    public function loggedInAs()
    {
        $auth = Zend_auth::getInstance ();
        if ($auth->hasIdentity ())
        {
            $email_id = $auth->getIdentity ()->email;
            return "Welcome"."   " ."<b>". $email_id."</b>";
        
        }

     }
}




































