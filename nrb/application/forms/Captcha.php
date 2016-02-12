<?php


class Application_Form_Captcha extends Zend_Form
{

    public function init()
    { 
	/*
	$captcha = new Zend_Form_Element_Captcha('foo', array(
    'label' => "Please verify you're a human",
    'captcha' => 'Figlet',
    'captchaOptions' => array(
        'captcha' => 'Figlet',
        'wordLen' => 6,
        'timeout' => 300,
    ),
));
 $submit = new Zend_Form_Element_Submit('submit');
	 $submit->setlabel('submit')
	        ->setIgnore(true);
	$this->addElements(
			      array(
				    $captcha,$submit));
					}*/

	
	 $recaptchakeys = Zend_Registry::get('config.recaptcha');
	 $recaptcha = new Zend_Service_Recaptcha($recaptchakeys['publickeys'],$recaptchakeys['privatekeys'],NULL,array('theme'=>'red'));
	 $captcha = new Zend_Form_Element_Captcha('captcha',
	            array(
				     'label'=>'type the characters',
					 'captcha'=>'Recaptcha',
					 'captchaOptions'=>array(
					                 'captcha'=>'Recaptcha',
									 'service'=>$recaptcha
									 )
								)
							);
	 $submit = new Zend_Form_Element_Submit('submit');
	 $submit->setlabel('submit')
	        ->setIgnore(true);
	$this->addElements(
			      array(
				    $captcha,$submit));
	}
	 /* $captcha = new Zend_Form_Element_Captcha('captcha',array(
	        'captcha' =>array(
			'captcha' => 'Figlet',
			'Wordlen' =>5,
			'timeout' => 300
			)
			));
		$captcha->setLabel('Verification');
		$this->addElement($captcha);
	*/
	
	/*$element = new Zend_Form_Element_Captcha('foo', array(
    'label' => "Please verify you're a human",
    'captcha' => array(
        'captcha' => 'Figlet',
        'wordLen' => 6,
        'timeout' => 300)
        )
         );
    $this->addElement($element);
	}
*/

/*
    $captchaElement = new Zend_Form_Element_Captcha('captcha',
                                                array('label'   => "Ihr generierter Textcode:",
                                                      'captcha' => array('captcha' => 'Image',
                                                      'name'    => 'myCaptcha',
                                                      'wordLen' => 5,
                                                      'timeout' => 300,
                                                      'font'    => 'verdana.ttf',
                                                      'imgDir'  => 'captcha/',
                                                      'imgUrl'  => '/captcha/')
                                                     )
                                                 );
    $elements[] = $captchaElement;
    foreach ($elements as $index => $element)
    {
        $element->setAttrib('tabindex', ($index + 1));
    }

	
	 /*
	   $this->addElement('captcha', 'captcha', array(
        'label'      => 'Please enter the 5 letters displayed below:',
        'required'   => true,
        'captcha'    => array(
            'captcha' => 'Figlet',
            'wordLen' => 5,
            'timeout' => 300
        ),
        'decorators' => array('Captcha', 'Errors', 'Labels', etc)
    ));*/

	
	//$captcha = new Zend_Form_Element_Captcha('captcha ');
	//	$captcha->setLabel('please enter the five digit displayed below')
	           //  ->setRequired(true)
				//->set(array('captcha'=>'figlet','wordlen'=>5,'timeout'=>300));
//$captcha= new Zend_Form_Element_Captcha_Figlet('captcha', array(
  //              'name'=>'foo',
	//			'wordlen'=>6,
		//		'timeout'=>300
          //      ));
//$captcha->setLabel('Please type the words shown ');
//$this->addElement($captcha);

	
	
	
}