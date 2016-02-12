<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{  

/*protected function _initView()
{   
    $router     = new Zend_Controller_Router_Rewrite();
    $controller = Zend_Controller_Front::getInstance();
    $controller->setControllerDirectory('./application/controllers')
               ->setRouter($router)
               ->setBaseUrl('/projects/myapp'); // set the base url!
    $response   = $controller->dispatch();
    /*$view = new Zend_View();

    $view->getHelper('BaseUrl')->setBaseUrl('http://mydomain.com');

    $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
        'ViewRenderer'
    );

    $viewRenderer->setView($view);

    return $view;
}


 protected function _initRequest()
    {
        $this->bootstrap('FrontController');
        $front = $this->getResource('FrontController');
        $request = new Zend_Controller_Request_Http();
        $front->setRequest($request);
        return $request;
    }*/

   protected function _initApp()
   {
    $this->bootstrap('view');
	$this->bootstrap('layout');
	$view =$this->getresource('view');
	$layout = $this->getResource('layout');
	$view = $layout->getView();
	$view->addHelperPath('library/view/helper','Library_View_Helper_LoggedInAs');
	 
    
      
	$view->doctype('HTML4_STRICT');
    $view->headMeta()->appendHttpEquiv('Content-type', 'text/html; charset=utf-8');

	$viewRenderer =  new Zend_Controller_Action_Helper_ViewRenderer();
	$viewRenderer->setView($view);
	Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
   }

   
   protected function _initautoload()
	{
	  /*************Load captcha****************/
	  $this->options = $this->getOptions();
	   Zend_Registry::set('config.recaptcha',$this->options['recaptcha']);
	   
	/********Autoloading the external class***********/
	$resourceLoader=new Zend_Loader_Autoloader_Resource(array(
            'basePath'=>'',
            'namespace'=>'',
            'resourceTypes'=>array(
                'loader'=>array(
                    'path'=>'library/',
                    'namespace'=>'CustomLoader_'
                ) )  ));            ;
        
        $autoLoader= Zend_Loader_Autoloader::getInstance();
        $autoLoader->pushAutoloader($resourceLoader);
        $autoLoader->pushAutoloader(new CustomLoader_Loadfile());
		$autoLoader->registerNamespace('CustomLoader_Loadfile');
		

    }
	  

	
	 protected function _initSessions()
   {
       Zend_Session::start();
   }
   


   protected function _initModuleAutoLoad()
   {
       $moduleLoader = new Zend_Application_Module_Autoloader(array(
               "namespace" => '',
               "basePath" => APPLICATION_PATH,
               "resourceType" => array(
                   'form' => array(
                       'path' => 'forms/',
                       'namespace' => 'Form_')
               ),
           ));

      // Zend_Controller_Action_HelperBroker::addPrefix('App_Action_Helper');
       return $moduleLoader;
   }

   
 

   function _initViewHelpers()
   {
       $this->bootstrap('layout');
       $layout = $this->getResource('layout');
       $view = $layout->getView();

       $view->doctype('HTML4_STRICT');
       $view->headMeta()->appendHttpEquiv('Content-type', 'text/html; charset=utf-8');
      
   }

}

