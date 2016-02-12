<?php
class Zend_View_Helper_FlashMessage extends Zend_View_Helper_Abstract
{
 protected function flashMessage($message)
  {
    $flashMessenger=$this->_helper->getHelper('FlashMessenger');
    $flashMessenger->setNamespace('actionErrors');
    $flashMessenger->addMessage($message);
   }
   
}
 
?>

