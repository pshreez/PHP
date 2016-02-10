<?php

class User_login {

	function index() {
		if (!F3::get('SESSION.onlineUser')) {
			F3::set('title', 'online user ');
			F3::set('navUser', 'userNav');
			F3::set('template', 'user_login');
			echo Template::serve("template/layout.html");
		} else {
			F3::reroute('/user/home');
		}
	}

	function login() {
		$user = new Axon('online_user');
		$username = F3::get("POST.username");
		$password = F3::get("POST.password");
		if ($user->found(array('username=:username and password=:password', array(':username' => $username, ':password' => $password))) == 1) {
			$user->load(array('username=:username and password=:password', array(':username' => $username, ':password' => $password)));
			F3::set("SESSION.onlineUser", $user->username);
			F3::reroute('/user/home');
		} else {
			F3::set('error', 'Username or password entered is wrong !!!');
			F3::set('navUser', 'userNav');
			F3::set('template', 'user_login');
			echo Template::serve("template/layout.html");
		}
	}

	function register() {
		F3::set('title', 'online user-register ');
		F3::set('navUser', 'userNav');
		F3::set('template', 'user_register');
		echo Template::serve("template/layout.html");
	}

	function register_approve() {
		$username = F3::get("POST.username");
		$password = F3::get("POST.password");
		$fullname = F3::get("POST.fullname");
		$user = new Axon('online_user');
		if (!$user->found(array('username=:username', array(':username' => $username))) == 1) {
			$sql[] = "INSERT into online_user (username,password,fullname) VALUES('$username','$password','$fullname')";
			DB::SQL($sql);
			F3::set('registered', 'You have been registered ,log into your account'."  "."<a href='{{@BASE}}' style='color:red;text-decoration:none'>login</a>");
			$this->register();
		} else {
			F3::set('userExist', 'User already exist');
			$this->register();
		}
	}

	function user_home() {
		$id = F3::get("PARAMS.sid");
		if (F3::get("SESSION.onlineUser")) {
			F3::set('navUser', 'userNav');
			$this->list_saved_form();
			F3::set('template', 'home');
			echo Template::serve("template/layout.html");
		} else {
			F3::reroute('/');
		}
	}

	public function list_saved_form() {
		F3::set('data', 'daved data on the  row');
		$user = F3::get("SESSION.onlineUser");
		$datas = DB::sql("select v.id,v.form_type,v.date,u.username from vehicle v, user_form u where u.vehicle_id=v.id and v.status ='saved' and u.username='" . $user . "'");
		F3::set('data', $datas);
	}

	function logout() {
		if (F3::get('SESSION.onlineUser')) {
			F3::clear('SESSION.onlineUser');
			F3::reroute('/');
		}
	}

}

?>
