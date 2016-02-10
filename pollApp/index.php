<?php
//echo 123;die;

$main = require __DIR__ . './lib/base.php';
$main->set('DEBUG', 3);
$main->set('UI', 'ui/');
$main->set('AUTOLOAD', 'app/');
$main->set('DB', new DB('mysql:host=localhost;dbname=polls', 'root', ''));
// Site title
$main->set('site', 'SMSCentral Poll Application');
$main->set('conf', array(
   'PAGESIZE' => 20,
   'imes' => 'Invalid poll',
    'tmes' => 'Thank you for your vote',
    'mes' => " '<br>'Create your own poll. Log on to: www.smscentral.com.np/poll",
    'smes' => 'Check out this poll'
));

$main->set('ONERROR', function() {
     F3::set('template', 'error');
      echo Template::serve("template/layout.htm");
});

//before session
$main->route('GET /home', 'App->getHome;');
$main->route('GET /poll/@pid','App->view;');
$main->route('GET /pollView/@pid','App->pollView');

//user functionality
$main->route('GET /logout', 'User->logout;');
$main->route('GET /login/@sid', 'User->login');
$main->route('POST /login', 'User->login');

//user functionality for polls
$main->route('GET /terms','App->getTOU');
$main->route('GET /create', 'App->create'); //shows form
$main->route('GET /myPolls', 'App->mypolls;');
$main->route('GET /polls/@id', 'App->mypolls;');
$main->route('POST /myPolls', 'Poll->add;'); //add and store poll to database
$main->route('GET /edit/@id','Poll->edit');
$main->route('POST /edit/@id','Poll->edited');//edit the poll
$main->route('GET /poll/delete/@id','Poll->delete');
$main->route('POST /createpublish','Poll->createPublish;');//create and post to facebook
$main->route('POST /updatepublish/@id','Poll->updatePublish;');//update and publish to facebook


$main->route('GET /vote.php?m=@m&t=@t&c=', 'Poll->vote');
$main->route('GET /vote.php?m=@m&t=@t&c=@c', 'Poll->vote');

$main->route('GET /data/@pid', 'App->viewData');
$main->route('GET /total/@pid', 'Poll->totalVote');
$main->route('GET /percent/@pid', 'App->percent');
$main->route('GET /graph/@pid', 'poll->showPercentage');

/* * * Polls info** */
$main->route('GET /polls/all', 'InfoPoll->all');
$main->route('GET /polls/top', 'InfoPoll->topPolls');
$main->route('GET /polls/latest', 'InfoPoll->latestPolls');
$main->route('GET /polls/recent', 'InfoPoll->recentActivity');
$main->route('GET /publish/@pid', 'Poll->toPublish');
$main->route('GET /published/@pid', 'Poll->publish');



// Admin navigation
$main->route('GET /admin', 'Admin->index;'); //admin login
$main->route('GET /admin/logout', 'Admin->logout;'); //admin login

$main->route('GET /admin/logout', 'Admin->logout;'); //admin logout
$main->route('POST /admin', 'Admin->adminLogin;'); //userlist admin can view
//$main->route('GET /admin/users', 'User->userList');

$main->route('GET /admin/@asid', 'Admin->adminLogin;User->userList');
$main->route('GET /admin/user', 'User->userList');

$main->route('GET /admin/user/@id', 'User->toggleActive');
$main->route('GET /admin/user/delete/@id', 'User->delete');
$main->route('GET /polls', 'Admin->allPoll');
$main->route('GET /admin/report', 'Report->getReport');
$main->route('POST /admin/report', 'Report->lst');
$main->route('GET /test', 'App->test');
$main->run();
?>