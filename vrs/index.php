<?php

$main = require __DIR__ . '/lib/base.php';

//F3::set('CACHE',TRUE);
$main->set('DEBUG',3);
$main->set('UI','ui/');
$main->set('FONTS', 'fonts/');
$main->set('AUTOLOAD', 'controller/');
$main->set('DB',
	new DB(
		'mysql:host=localhost;dbname=vrs',
		'root',
		''
	)
);

$main->set('db_param', array(
  'live_host' => "mysql:host=localhost;dbname=db_vrs",
    'live_user' =>"root",
    'live_password'=>"3!!5(("
));
$main->set('local_param', array(
  'local_host' => "mysql:host=localhost;dbname=db_vrs_public",
    'local_user' =>"root",
    'local_password'=>"3!!5(("
));
$main->set('ONERROR', function() {
          F3::reroute('/user/home');
});

//$main->set('dateParams',array(
  //  "DSN" => "mysql:host=localhost;dbname=vrs",
  //  "DB_USER" => "root",
   // "DB_PWD" => ""
//));



//all user requirements
$main->route('GET /','User_login->index;');
$main->route('POST /','User_login->login;');
$main->route('GET /user/home','User_login->user_home');
$main->route('GET /user/home/@sid','User_login->user_home');
$main->route('GET /user/logout','User_login->logout');
$main->route('GET /user/register','User_login->register');
$main->route('POST /user/register','User_login->register_approve');


$main->route('POST /saveRegister','SavedForm->registration_save');
$main->route('POST /saveNamsari','SavedForm->namsari_save');
//{{@BASE}}/saveRegister

$main->route('GET /register','User->new_registration');
$main->route('POST /register','User->addVehicleData');
$main->route('GET /savedRegister/@reg','Savedform->getSavedRegistration');
$main->route('POST /savedRegister/@reg','Savedform->submitRegister');

$main->route('GET /owner/@vid','User->vehicleOwner');
$main->route('POST /owner','User->ownerData;');
//getSavedNamsari

$main->route('GET /transfer','User->transfer_ownership');
$main->route('POST /transfer','User->transfer');
$main->route('GET /savedNamsari/@trans','Savedform->getSavedNamsari');
$main->route('POST /savedNamsari/@trans','Savedform->submitNamsari');
$main->route('GET /deleteform/@id','Savedform->deleteForm');


$main->route('GET /newOwner/@vid','User->newOwner');
$main->route('POST /newOwner/@vid','User->ownerData');
$main->route('GET /image','User->captcha');
$main->route('GET /upload','Pictureck->index');
$main->route('POST /upload','Picture->pictureFolder');

//feedback
$main->route('GET /feedback/@id','Feedback->registration_feedback');
$main->route('GET /feedbackt/@id','Feedback->transfer_feedback');
$main->route('GET /help/register','Feedback->help');
$main->route('GET /help/transfer','Feedback->helpTransfer');
//$main->route('GET /printRegistration','Feedback->registerFeed');
//$main->route('GET /printNamsari','Feedback->namsariFeed');

//admin portionck
$main->route('GET /admin','Admin->index;');
$main->route('GET /admin/logout','Admin->logout');
$main->route('GET /logout','Admin->logout;');
$main->route('POST /admin','Admin->adminlogin');
$main->route('GET /admin/home','Admin->home');
$main->route('GET /admin/addUsers','Admin->createUser');
$main->route('POST /admin/addUsers','Admin->addUser');
$main->route('GET /admin/viewUsers','Admin->viewUsers');
$main->route('GET /admin/delete/@id','Operator->deleteUser');
$main->route('GET /admin/edit/@id','Operator->editUser');
$main->route('POST /admin/edit/@id','Operator->edit');

$main->route('GET /admin/newRegistration','Admin->viewRegistrations');
$main->route('GET /admin/newRegistration/@message','Admin->viewRegistrations');
$main->route('POST /admin/newRegistration','Admin->dataRegistrations');
$main->route('GET /admin/viewRegistration/@id','Operator->viewRegistration');
$main->route('POST /admin/viewRegistration/@id','Operator->approveRegistration');
$main->route('GET /admin/dismissReg/@id','Operator->dismissRegistration');
$main->route('GET /admin/ownershipTransfer','Admin->viewNamsari');
$main->route('GET /admin/ownershipTransfer/@message','Admin->viewNamsari');
$main->route('POST /admin/ownershipTransfer','Admin->dataNamsari');
$main->route('GET /admin/viewNamsari/@id','Operator->viewNamsari');
$main->route('POST /admin/viewNamsari/@id','Operator->approveNamsari');
$main->route('GET /admin/dismissNamsari/@id','Operator->dismissNamsari');
$main->route('GET /admin/adminLog','Admin->adminLog');
$main->route('POST /admin/adminLog','Admin->reportLog');
$main->route('GET /admin/print/@id','PrintDoc->index');
$main->route('GET /admin/print/t/@id','PrintDoc->transfer_print');

$main->route('GET /operator','Operator->index');

// dynamic zone and district
$main->route('GET /getDistricts/@zone_id', 'Zone->getDistricts');
Sabin: $main->route('GET /getVdc/@district_id/vdc.php?term=@term', 'Zone->getVdc');



$main->run();
?>
