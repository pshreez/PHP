<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        $this->setName ( 'RegisterForm' );
        $id = new Zend_Form_Element_Hidden ( 'user_id' );
        $id->addFilter ( 'Int' );
        $firstname = new Zend_Form_Element_Text ( 'fname' );
        $firstname->setLabel ( 'First name' )
                  ->setRequired ( true );
        $lastname = new Zend_Form_Element_Text ( 'lname' );
        $lastname->setLabel ( 'Lastname' )
                 ->setRequired ( true );
       
        $email = new Zend_Form_Element_Text ( 'email' );
        $email->setLabel ( 'Email' )
              ->addValidator ( 'EmailAddress' )
              ->setRequired ( true )
              ->addFilter ( 'StripTags' )
              ->addFilter ( 'StringTrim' )
              ->addValidator ( 'NotEmpty' );
        $password = new Zend_Form_Element_Password ( 'password' );
        $password->setLabel ( 'Password' )
                 ->setRequired ( true )
                 ->addFilter ( 'StripTags' )
                 ->addFilter ( 'StringTrim' )
                 ->addValidator ( 'NotEmpty' );
        $confirmpassword = new Zend_Form_Element_Password ( 'confirmpassword' );
        $confirmpassword->setLabel('Confirm Password')
                        ->setRequired(true);
	    $recaptchakeys = Zend_Registry::get('config.recaptcha');
	    $recaptcha = new Zend_Service_Recaptcha($recaptchakeys['publickeys'],$recaptchakeys['privatekeys'],NULL,array('style'=>'direction: ltr;','theme'=>'clean','timeout'=>'300'));
	    $captcha = new Zend_Form_Element_Captcha('captcha',
	                                         array(
												 'label'=>'Insert the characters',
												 'captcha'=>'Recaptcha',
												 'captchaOptions'=>array(
																 'captcha'=>'Recaptcha',
																 'service'=>$recaptcha
																 )
															)
														);


        $register = new Zend_Form_Element_Submit ( 'Register' );
        $register->setLabel ( 'Register here' )
                 ->setIgnore ( true );
        $register->setAttrib ( 'id', 'submitbutton' );
		
        $this->addElements ( array (
                                    $id,
                                    $firstname,
                                    $lastname, 
                                    $email,
                                    $password,
                                    $confirmpassword,
									$captcha,
                                    $register
                               ) );
    }

}

