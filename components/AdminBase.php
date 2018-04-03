<?php
include_once(ROOT . '/models/User.php');

abstract class AdminBase
{
  public static function checkAdmin()
  {
    
    $userId = User::checkLogged();
    $user = User::getUserById($userId);
    
    if ($user['isAdmin'] == 1) {
      return true;
    } else {
      die('Access denied');
    }
  }
}