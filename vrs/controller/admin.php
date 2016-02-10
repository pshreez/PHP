<?php

class Admin {

  function index() {
    if (!F3::get("SESSION.asid")) {
      F3::set('templateAdmin', 'admin');
      F3::set('title', 'Admin');

      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin/home");
    }
  }

  function adminlogin() {

    $admin = new Axon('admin');
    $username = F3::get("POST.username");
    $password = F3::get("POST.password");
    if ($admin->found(array('username=:username and password=:password', array(':username' => $username, ':password' => md5($password)))) == 1) {
      $admin->load(array('username=:username and password=:password', array(':username' => $username, ':password' => md5($password))));

      F3::set('SESSION.wheeler', $admin->type);
      //  echo $admin->type;die;
      F3::set("SESSION.username", $admin->username);
      F3::set('SESSION.asid', $this->getRN());
      F3::reroute('/admin/home');
    } else {
      F3::set('error', 'Username or password entered was wrong !!!');
      F3::set('templateAdmin', 'admin');
      echo Template::serve("template/layout.html");
    }
  }

  function logout() {
    if (F3::get('SESSION.asid')) {
      F3::clear('SESSION.asid');
      F3::clear('SESSION.wheeler');
      F3::reroute('/admin');
    }
  }

  function home() {
    if (F3::get('SESSION.asid')) {
      $user = F3::get('SESSION.wheeler');
      if ($user == 1) {
        $form = new Axon("vehicle");
        $datas = $form->find("status != 'saved'");
        if($datas){
        foreach ($datas as $d) {
          $data[] = array($d->id, $d->date, $d->ip_address, $d->wheeler, $d->form_type,$d->status);
        }
        }
        else{
          $data=0;
        }
      }
      else {
        $form = new Axon("vehicle");
       // echo $user;
        if ($form->found(array('wheeler=:id', array(':id' => $user))) ) {
         
           $d = $form->find("status != 'saved' && wheeler = '$user'");
           if($d != 0){
           foreach ($d as $datas) {
            // $data[] = array(3, 3, 3,3, 3);
             $data[] = array($datas->id, $datas->date, $datas->ip_address, $datas->wheeler, $datas->form_type,$datas->status);
           }
          
           }
           else{
             $data[] = 0;
           }
        } else {
           $data[] = 0;
        }
      }
      F3::set('data', $data);
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - Home');
      F3::set('templateAdmin', 'adminHome');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin");
    }
  }

  function createUser() {
    if (F3::get('SESSION.asid')) {
      echo F3::get('SESSION.wheeler');
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - Create User');
      F3::set('templateAdmin', 'addUsers');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin");
    }
  }

  function addUser() {
    $username = F3::get("POST.username");
    $password = F3::get("POST.password");
    $fullname = F3::get("POST.fullname");
    $type = F3::get("POST.type");
    $admin = new Axon('admin');
    if (!$admin->found(array('username=:username', array(':username' => $username))) == 1) {

      $sql[] = "INSERT into admin (username,password,fullname,type) VALUES('$username','" . md5($password) . "','$fullname','$type')";
      DB::SQL($sql);
      $user = new Operator;
      $users = $user->userList();
      $this->viewUsers();
    } else {
      F3::reroute('/admin');
    }
  }

  function viewUsers() {
    if (F3::get('SESSION.asid')) {
      $user = new Operator;
      $users = $user->userList();
      F3::set('userList', $users);
      F3::set('title', 'Admin - User List');
      F3::set('nav', 'navigation');
      F3::set('templateAdmin', 'userList');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin");
    }
  }

  function viewRegistrations() {
    if (F3::get('SESSION.asid')) {
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - new Registrations');
      F3::set('templateAdmin', 'registrationData');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin");
    }
  }

  function dataRegistrations() {

    $date1 = F3::get("POST.date1");
    $date2 = F3::get("POST.date2");
    $status = F3::get("POST.status");
    // echo $status;

    $user = new Axon('vehicle');

    $wheeler_type = F3::get("SESSION.wheeler"); //echo $wheeler_type; //this value is from admin session 'type
    $wheeler_sql = $wheeler_type == 1 ? "" : " and wheeler='" . $wheeler_type . "'";
    //  var_dump($wheeler_sql);die;
    $wheeler = array('21' => '2', '22' => '4');

    if ($user->found("date between '" . $date1 . "' and '" . $date2 . "' and form_type='registration' $wheeler_sql  and status='$status' ") < 1) {

      $data = array();
      //  echo "date between '" . $date1 . "' and '" . $date2 . "' and form_type='registration'  $wheeler_sql and status='$status' ";
    } else {
      $list = $user->find("date between '" . $date1 . "' and '" . $date2 . "' and form_type='registration'  $wheeler_sql and status='$status'");
      foreach ($list as $lists) {
        $zone = $this->getZone($lists->zone_id);
        $symbol = $lists->vehicle_symbol_type == 0 ? 0 : $this->getSymbolType($lists->vehicle_symbol_type);

        $vehicleNo = $zone . $lists->lot_number . $symbol . $lists->number;
        $w_type = $wheeler[$lists->wheeler];
        $data[] = array($vehicleNo, $lists->date, $lists->engine_num, $lists->chessis_num, $lists->model, $lists->ip_address, $w_type, $lists->id);
      }
    }
    F3::set('data', $data);
    F3::set('nav', 'navigation');
    F3::set('title', 'Admin - new Registrations');
    F3::set('templateAdmin', 'registrationData');
    echo Template::serve("template/layout.html");
  }

  function viewNamsari() {
    if (F3::get('SESSION.asid')) {
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - Namsari');
      F3::set('templateAdmin', 'namsariData');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin");
    }
  }

  function dataNamsari() {
    $date1 = F3::get("POST.date1");
    $date2 = F3::get("POST.date2");
    $status = F3::get("POST.status");
    // var_dump($status);die;
    $user = new Axon('vehicle');
    $wheeler_type = F3::get("SESSION.wheeler"); //this value is from admin session 'type
    $wheeler_sql = $wheeler_type == 1 ? "" : " and wheeler='" . $wheeler_type . "'";
    $wheeler = array('21' => '2', '22' => '4');
    if ($user->found("date between '" . $date1 . "' and '" . $date2 . "' and form_type='namsari'  $wheeler_sql and status='" . $status . "'") < 1) {
      $data = array();
    } else {
      $list = $user->find("date between'" . $date1 . "' and '" . $date2 . "' and form_type='namsari' $wheeler_sql and status='" . $status . "'");
      foreach ($list as $lists) {
        $zone = $this->getZone($lists->zone_id);
        $symbol = $this->getSymbolType($lists->vehicle_symbol_type);
        // var_dump($symbol);die;
        $vehicleNo = $zone . $lists->lot_number . $symbol . $lists->number;

        // var_dump($veihcleNo);
        $w_type = $wheeler[$lists->wheeler];
        $data[] = array($vehicleNo, $lists->date, $lists->engine_num, $lists->chessis_num, $lists->model, $lists->ip_address, $w_type, $lists->id);
      }
    }

    F3::set('data', $data);
    F3::set('nav', 'navigation');
    F3::set('title', 'Admin - Namsari');
    F3::set('templateAdmin', 'namsariData');
    echo Template::serve("template/layout.html");
  }

  function adminLog() {
    if (F3::get('SESSION.asid')) {
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - Log');
      F3::set('templateAdmin', 'adminLog');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin");
    }
  }

  function reportLog() {
    if (F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }

    $admin = new Axon("admin_log");
    // $users=$admin->afind();
    $date1 = F3::get("POST.date1");
    $date2 = F3::get("POST.date2");
    if ($users = $admin->found()) {
      // var_dump($users);die;
      $users = $admin->afind("date between '" . $date1 . "' and '" . $date2 . "'");
      F3::set('report', $users);
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - Log');
      F3::set('templateAdmin', 'adminLog');
      echo Template::serve("template/layout.html");
    } else {
      $users = array();
      F3::set('report', $users);
      F3::set('nav', 'navigation');
      F3::set('templateAdmin', 'adminLog');
      echo Template::serve("template/layout.html");
    }
  }

  public static function getRN($c = 32) {

    $rn = "";
    $c = is_int($c) && $c > 10 ? $c : 32;
    for ($i = 0; $i < $c; $i++) {
      $temp = array();
      $temp[] = rand(48, 57);
      $temp[] = rand(65, 90);
      $temp[] = rand(97, 122);
      $rn .= chr($temp[rand(0, 2)]);
    }
    return $rn;
  }

  static function getZone($id) {
    $zone = new Axon("zone");
    $zone->load(array("id=:id", array(":id" => $id)));
    return $zone->code;
  }

  static function getSymbolType($id) {
    $zone = new Axon("type_symbol");
    $zone->load(array("id=:id", array(":id" => $id)));
    return $zone->name;
  }

}

?>
