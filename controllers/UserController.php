<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT . '/models/User.php');

class UserController
{
  public function actionRegister()
  {
  
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    $name = '';
    $email = '';
    $password = '';
    $result = false;
    
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      
      $errors = false;
      
      if (!User::checkName($name)) {
        $errors[] = 'Имя не должно быть короче двух символов';
      }
      if (!User::checkEmail($email)) {
        $errors[] = 'Некорректный email';
      }
      if (User::checkEmailExists($email)) {
        $errors[] = 'Такой email уже используется';
      }
      if (!User::checkPassword($password)) {
        $errors[] = 'Пароль не должен быть короче шести символов';
      }
      
      if ($errors == false) {
        $result = User::Register($name, $email, $password);
      }
    }
    
    require_once(ROOT . '/views/user/register.php');
    return $result;
  }
  
  public function actionLogin()
  {
  
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    $email = '';
    $password = '';
    $result = false;
    
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $errors = false;
      
      if (!User::checkEmail($email)) {
        $errors[] = 'Некорректный email';
      }
      if (!User::checkPassword($password)) {
        $errors[] = 'Пароль не должен быть короче шести символов';
      }
      

      $user = User::checkUserData( $email);
  
      if ($user != false || password_verify('$password', $user['password'])) {
        User::auth($user);
        header('Location: /cabinet/');
      } else {
        $errors[] = 'Вы ввели неправильные данные';
      };
      
    }
    require_once(ROOT . '/views/user/login.php');
    return true;
  }
  
  public function actionLogout() {
    header('Location: /user/login');
    User::logout();
  }
}