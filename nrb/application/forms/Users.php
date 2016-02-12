<?php

class Application_Form_Users extends Zend_Form
{
	public function init()
    {
	  $this	 ->setName('LoginForm')
		     ->setMethod('post')
	         ->setAction('validate');
        $id = new Zend_Form_Element_Hidden('user_id');
        $id->addFilter('Int');
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email address')
		       ->addValidator('EmailAddress')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
		//$this->addElement(array($email_id));
			   //->addFilter('stringtoLower');
	    $email->setAttrib('class','input');
        $password= new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');
			  //->addValidator('StringLength',false,array(12));
			  //->setRequired(true);
		//$this->addElement(array('$password'));
	    $password->setAttrib('class','input');
        $submit = new Zend_Form_Element_Submit('Login');
		$submit->setLabel('Login here');
		 $submit->setAttrib('id', 'submitbutton');//id=submitbutton
	   /*$register = new Zend_Form_Element_Submit('Register');
		$register->setLabel('Register here')
		         ->setIgnore(true);
		$register->setAttrib('id', 'submitbutton');*/
       
        $this->addElements(array($id, $email, $password, $submit));
		    
    }
	 
        
    }
	
/*	public function getloginForm()
	{
	$this->setName('loginform')
		     ->setMethod('post')
	         ->setAction('index/validate');
        $id = new Zend_Form_Element_Hidden('user_id');
        $id->addFilter('Int');
        $email = new Zend_Form_Element_Text('email_id');
        $email->setLabel('Email')
		       ->addValidator('EmailAddress')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
		//$this->addElement(array($email_id));
			   //->addFilter('stringtoLower');
	    $email->setAttrib('class','input');
        $password= new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');
			  //->addValidator('StringLength',false,array(12));
			  //->setRequired(true);
		//$this->addElement(array('$password'));
	    $password->setAttrib('class','input');
        $submit = new Zend_Form_Element_Submit('Login');
        $submit->setAttrib('id', 'submitbutton');//id=submitbutton
        $this->addElements(array($id, $email, $password, $submit));
		    
    }
	*/

