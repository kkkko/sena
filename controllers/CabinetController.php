<?php

include_once(ROOT . '/models/User.php');
include_once(ROOT.'/models/Category.php');

class CabinetController
{
  public function actionIndex()
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    $user = User::checkLogged();
    
    require_once(ROOT . '/views/cabinet/index.php');
    return true;
  }
  
  public function actionEdit()
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    $user = User::checkLogged();
    $userId = $user['id'];
    
    $name = $user['name'];
    $password = $user['password'];
    $result = false;
    
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      
      $errors = false;
      
      if (!User::checkName($name)) {
        $errors[] = 'Имя не должно быть короче двух символов';
      }
      if (!User::checkPassword($password)) {
        $errors[] = 'Пароль не должен быть короче шести символов';
      }
      
      if ($errors == false) {
        $result = User::edit($userId, $name, $password);
      }
    }
    require_once(ROOT . '/views/cabinet/edit.php');
    return true;
  }
}