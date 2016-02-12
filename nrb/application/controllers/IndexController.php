<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /*
         * Initialize action controller here
         */
    }

    public function indexAction()
    {
       // $data = new Application_Model_DbTable_Rate();
		//$this->view->data=$data->fetchAll();
    
    }

    public function loginAction()
    {  
	  if(Zend_Auth::getInstance()->getIdentity())
	  {
	  $this->_forward('currencyinfo');
	 } 
	 else
	 {
        $form = new Application_Form_Users();
        $this->view->form = $form;
	  }
    }
	 public function captchaAction()
    {
        $form = new Application_Form_Captcha();
        $this->view->form = $form;
		if ($this->getRequest()->isPost() && $form->isValid($this->_getAllParams()))
       {
		$this->_forward('login');
       }
       
    
    }

    private function getAuthAdapter()
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable ( Zend_Db_Table::getDefaultAdapter () );
        $authAdapter->setTableName ( 'user' )
		            ->setIdentityColumn ( 'email' )
					->setCredentialColumn ( 'password' );
        return $authAdapter;
    }

    public function validateAction() 
    {
        if ($request = $this->getRequest ()->isPost ())
        {
            $form = new Application_Form_Users ();
            $data = $this->getRequest ()->getPost ();
			if (empty($data['email'] ) && empty($data['password']))
			{
			  $this->_forward('wrong');
			}
            elseif (! $form->isValid ( $data ))
            {
			 $this->_forward('invalid');
			 $this->_flashMessage('Invalid email address or password');
            }
            else
            {
                $email_id = $data ['email'];
                $password = $data ['password'];
                $authAdapter = $this->getAuthAdapter ();
                $authAdapter->setIdentity ( $email_id )
				            ->setCredential ( $password )
							->setCredentialTreatment('md5(?)');
							
                  $auth = Zend_Auth::getInstance(); 
                $result = $auth->authenticate ( $authAdapter );
                if ($result->isValid ())
                {
                    $userInfo = $authAdapter->getResultRowobject ( 'email', 'password' );
                    $authStorage = $auth->getStorage ();
                    $authStorage->write ( $userInfo );
                    $this->_redirect( 'paginator/recent' );
					
					
                }
                else
                {
                    $this->_redirect ( '/' );
                }
				
		
			}
        
        }
    
    }
	  
	

    public function registerAction()
    {   
	
        $form= new Application_Form_Register();
		$this->view->form=$form;
		if($this->getRequest()->isPost())
		{
        $formData =$this->getRequest()->getPost();
        if($form->isValid($formData))
 		{
                $firstName = $form->getValue('fname');
				$lastName = $form->getValue('lname');
			
				$email = $form->getValue('email');
				$password= $form->getValue('password');
				$confirmpassword = $form->getValue('confirmpassword');
				if($confirmpassword == $password)
				{
				  
					$registered = new Application_Model_DbTable_User();
					$registered->registerUser($firstName,$lastName,$email,$password);
					$this->_redirect( 'index/login' );
                
				}
				else
				{
					echo "milcha ki mildaina malai k tha";
				}
				//$this->_redirect('login');
		}
         else 
		 {
                $form->populate($formData);
          }
				
		}
    }
        
	public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
		$this->_redirect('index/login');
		
    }
	
	public function forgotpassword()
	{
	}
	
	
	public function csvAction($newData)
	{
	  $currency= new Application_Model_DbTable_Rate();
	    $exportData=$currency->fetchDataRate();
		//var_dump($exportData);die;
		$newData[0] = array('Name','Date','Buying Price','Selling Price');
		$i=1;
		foreach($exportData as $data)
		{
		  $newData[$i][0]=$data['name'];
		  $newData[$i][1]=$data['date'];
		  $newData[$i][2]=$data['buy_price'];
		  $newData[$i][3]=$data['sell_price'];
		  $i++;
		}
	}
}	