<?php

class Snippets {

  public static function _isAjax() {
    if (!empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest") {
      return true;
    } else {
      return false;
    }
  }

  public static function _isPost() {
    if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
      return true;
    } else {
      return false;
    }
  }

  public static function _showError($message = "") {
    if (Snippets::_isAjax()) {
      if (Snippets::_isPost()) {
        $ret = array('error' => true);
        if($message == "") $message = F3::get('ERROR.text');
        $ret['message'] = $message;
        echo json_encode($ret);
      } else {
        $ret = 'error';
        if($message == "") $message = F3::get('ERROR.text');
        $ret .= " [$message]";
        echo $ret;
      }
    } else {
      F3::set('title', 'Page Not Found');
      F3::set('template', 'error');
      echo Template::serve("template/layout.htm");
    }
  }

  public static function _getRN($c = 32) {
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

}

?>