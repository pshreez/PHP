<?php
class Error{   
    
    public static function onError($message = "") {

             
            F3::set('templateAdmin', 'error');
            echo Template::serve("template/layout.html");
  }

}

?>
