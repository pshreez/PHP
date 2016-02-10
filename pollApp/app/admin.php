<?php

class Admin extends F3instance {

  function index() {
    if (!F3::get('SESSION.asid')) {
      F3::set('template', 'adminhome');
      echo Template::Serve('template/admin/layout.htm');
    }
    else{
      
    }
  }

  function adminLogin() {

    $admin = new Axon('tbl_admin');
    $username = F3::get('POST.usr');
    $password = F3::get('POST.pwd');

    if ($admin->found(array('username=:username and password=:password', array(':username' => $username, ':password' => md5($password)))) == 1) {
      $admin->load(array('username=:username and password=:password', array(':username' => $username, ':password' => md5($password))));
      F3::set('SESSION.admin', $admin);
       F3::set('SESSION.asid', Snippets::_getRN());
      echo json_encode(array('message' => "You have been logged in "));
    } else {
       echo json_encode(array('mes' => "Either password or usernaem is wrong"));
    }
  }

  function allPoll() {
    if (!F3::get('SESSION.asid')) {
      F3:reroute('/admin');
    }
    $poll = new Axon("tbl_poll");
    $poll->def('fullname', 'SELECT fullname FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
    $poll->def('image', 'SELECT image FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');

    $poll->def('hits', 'SELECT COUNT(date) FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id');

    $q = $poll->find();
    $users = array();
    foreach ($q as $qu) {
      $polls[$qu->id] = array(strtoupper($qu->keyword), $qu->question, '<img src="' . $qu->image . '" width="20px" height="20px" />' . $qu->fullname, (date_create("now") >= date_create($qu->expiry_date) ? "Yes" : "No"), ($qu->published_date ? "Yes" : "No"), ($qu->published_date && date_create("now") < date_create($qu->expiry_date) && $qu->is_archive == "n" ? "Yes" : "No"), ($qu->private == 'y' ? "Private" : "Public"), $qu->hits);
      if (!in_array($qu->fullname, $users)) {
        $users[] = $qu->fullname;
      }
    }
    F3::set('pollList', $polls);
    F3::set('users', $users);
    F3::set('template', 'poll');
    echo Template::Serve('template/admin/layout.htm');
  }

  function logout() {
    if (!F3::get('SESSION.asid')) {
      F3:reroute('/admin');
    }
    if (F3::get('SESSION.asid')) {
      $this->clear('SESSION.asid');
      $this->clear('SESSION.admin');
      F3::reroute('/admin');
    }
  }

}

?>