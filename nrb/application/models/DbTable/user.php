<?php

class Application_Model_DbTable_user extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';
	
	public function getUser($id)
	{
	$id = (int)$id;
	$row = $this->fetchRow('id='.$id);
	if(!$row) 
	{
	   throw new Exception("could not get the row $id");
	  }
	   return $row->toArray();
	   
	}
	
	
	
	
	
	public function registerUser($firstName,$lastName,$email,$password)
	{
	   $data=array(
	      'fname'=>$firstName,
          'lname'=>$lastName,
          'email'=>$email,
          'password'=>md5($password) 
      
		);
		$this->insert($data);
	}
	/*
	
	public function loginUser($email_id, $password)
    {
        
        if ($email_id && $password)
        {
            $user->email= $email_id;
            $user->password = $password;
            $user->save ();
            return $user;
        }
		
        else
        {
            throw new Zend_Exception ( "Couldnot get the data" );
        }
    }
    public function registerRegistered($firstname,$lastname,$phone_no,$email,$password,$confirmpassword)
    {   
	 $rowUser = $this->createRow();
    if($rowUser)
    {
        $rowUser->fname=$firstname;
        $rowUser->lname=$lastname;
        $rowUser->phone_no=$phone_no;
        $rowUser->email_id=$email;
        $rowUser->password=$password;
        $rowUser->confirmpassword=$confirmpassword;
        $rowuser->save();
        return $rowUser;
    }
    else
    {
        $this->_redirect('/index');
         
         
    }
    
} */
}
