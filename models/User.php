<?php

class User
{
  public static function Register($name, $email, $password)
  {
    $db = DB::getConnection();
    
    $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';
    
    $result = $db->prepare($sql);
    
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    
    return $result->execute();
  }
  
  public static function edit($userId, $name, $password)
  {
    $db = DB::getConnection();
    
    $sql = 'UPDATE user SET name = :name, password = :password WHERE id = :user_id';
    
    $result = $db->prepare($sql);
    
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
    
    return $result->execute();
  }
  
  public static function checkName($name)
  {
    if (strlen($name) >= 2) {
      return true;
    } else {
      return false;
    }
  }
  
  public static function checkEmail($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }
  
  public static function checkEmailExists($email)
  {
    $db = DB::getConnection();
    
    $sql = 'SELECT * FROM user WHERE email = :email';
    
    $result = $db->prepare($sql);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->execute();
    
    if ($result->fetchColumn()) {
      return true;
    } else {
      return false;
    }
    
  }
  
  public static function checkPassword($password)
  {
    if (strlen($password) >= 6) {
      return true;
    } else {
      return false;
    }
  }
  
  public static function checkUserData($email)
  {
    $db = DB::getConnection();
    
    $sql = 'SELECT * FROM user WHERE email = :email';
    
    $result = $db->prepare($sql);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->execute();
    
    $user = $result->fetch();
    if ($user) {
      return  $user;
    } else {
      return false;
    }
  }
  
  public static function auth($userId)
  {
    $_SESSION['user'] = $userId;
  }
  
  public static function checkLogged()
  {
    if (isset($_SESSION['user'])) {
      return $_SESSION['user'];
    }
    header('Location: /user/login');
  }
  
  public static function isGuest()
  {
    if (isset($_SESSION['user'])) {
      return false;
    }
    return true;
  }
  
  public static function getUserById($userId) {
    $db = DB::getConnection();
  
    $sql = 'SELECT * FROM user WHERE id = :userId';
  
    $result = $db->prepare($sql);
    $result->bindParam(':userId', $userId, PDO::PARAM_INT);
  
    $result->setFetchMode(PDO::FETCH_ASSOC);
    
    return $result->fetch();
  }
}