
<?php 

class Zend_View__Helper_LoggedInAs extends Zend_View_Helper_Abstract
{
   public function loggedInAs()
   {
   $auth = Zend_auth::getInstance();
   if($auth->hasIdentity())
    {
	  $email_id = $auth->getIdentity()->email_id;
	  return $email_id;
	  }
	}
}
	 /* $request = Zend_Controller_Front::getinstance()->getRequest();
	  $controller = $request->getControllerName();
	  $action = $request->getActionName();
	  if($controller == 'index' && $action == 'logout')
	     {
		   return '';
		 }
	  $loginUrl = $this->view->url(array('controller'=>'index','action'=>'logout'));
	  return '<a href="'.$loginUrl.'">Logout</a>';
	 
	}
   
}
 */
?>