<?php

class User extends F3instance {

    function login() {
        $user = new Axon('tbl_user');
        $id = F3::get('POST.id');
    
        if ($user->found(array("id=:id", array(":id" => $id))) == 0) {
            // Register user
            $user->id = $id;
            $user->username = F3::get('POST.username');
            $user->email = F3::get('POST.email');
            $user->fullname = F3::get('POST.fullname');
            $user->image = F3::get('POST.image');
            $user->save();
        } else {
           
            $user->load(array("id=:id", array(":id" => $id)));
            
            if ($user->active == 'n') {
                die(json_encode(array("message" => "hello world", "type" => "error")));

            } else {


                $user->username = F3::get('POST.username');
                $user->email = F3::get('POST.email');
                $user->fullname = F3::get('POST.fullname');
                $user->image = F3::get('POST.image');
                $user->save();
            }
       
            F3::set('SESSION.user', $user);
            F3::set('SESSION.sid', Snippets::_getRN());

        }
    }

    function logout() {

        if (F3::get('SESSION.sid')) {
            $this->clear('SESSION.sid');
            $this->clear('SESSION.user');
            F3::reroute('/home');
        }

    }

    function userlist() {
      if (!F3::get('SESSION.asid')) {
             F3:reroute('/admin');
          }
      
        $user = new Axon('tbl_user');
        $users = array();
        $user_list = $user->find();
        if($user_list !=NULL){
        foreach ($user_list as $ul) {
            $users[] = array($ul->email, $ul->username, '<img src="' . $ul->image . '" width="20px" height="20px" /> ' . $ul->fullname, ($ul->active == 'y' ? 'Yes' : 'No'), '<center><a href="#" class="blockLink" data-id="' . $ul->id . '">' . ($ul->active == 'y' ? 'Block' : 'Unblock') . '</a><br/><a href="#" class="deleteLink" data-id="' . $ul->id . '">Delete</a></center>');
        }
         $i = 0;
        foreach ($user_list as $user) {
            $user_id[] = $user_list[$i]->id;
            $i++;
        }
        }
        else{
          $users=0;
          $user_id=0;
        }
        $this->set('identity', $user_id);
        $this->set('userList', $users);
        $this->set('title', 'User');
        if (Snippets::_isAjax()) {
            echo Template::serve("template/admin/user.htm");
        } else {
            $this->set('template', 'user');
            echo Template::serve("template/admin/layout.htm");
        }
    }

    function delete() {
  
        $id = F3::get('PARAMS["id"]');
        $user = new Axon('tbl_user');
        $user->load(array("id=:id", array(":id" => $id)));
        $user->erase();
        F3::reroute('/admin');
    }

    function toggleActive() {

        $id = F3::get("PARAMS.id");
        $user = new Axon('tbl_user');
        $user->load(array("id=:id", array(":id" => $id)));
        $user->active = $user->active == 'y' ? 'n' : 'y';
        $user->save();
        F3::reroute('/admin/user');
    }

}

?>