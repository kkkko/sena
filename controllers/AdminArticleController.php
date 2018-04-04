<?php
include_once(ROOT . '/components/AdminBase.php');
include_once(ROOT . '/models/Artticle.php');
include_once(ROOT . '/models/Category.php');

class AdminArticleController extends AdminBase
{
  public static function actionIndex()
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    self::checkAdmin();
    $articleList = Article::getArticleListAdmin();
    require_once(ROOT . '/views/admin_article/index.php');
    return true;
  }
  
  public static function actionCreate()
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    self::checkAdmin();
    if (isset($_POST['submit'])) {
      $date = date("d F, Y");
      $options['title'] = $_POST['title'];
      $options['description'] = $_POST['description'];
      $options['content'] = $_POST['content'];
      $options['category_id'] = $_POST['category_id'];
      $options['status'] = $_POST['status'];
      $options['date'] = $date;
  
      if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imageName = md5($_FILES['image']['name']) .'.jpg';
        $options['image'] = $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] ."/upload/images/articles/" .$imageName);
      }
      
      $errors = false;
      
      if (!isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['content'])) {
        $errors[] = 'Заполните все обязательные поля';
      }
      if ($errors == false) {
        $id = Article::createArticle($options);
        header('Location: /admin/articles');
      }
    }
    require_once(ROOT . '/views/admin_article/create.php');
    return true;
  }
  
  public static function actionUpdate($id)
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    self::checkAdmin();
    
    $article = Article::getArticleById($id);
  
    $options['title'] = $article['title'];
    $options['description'] = $article['description'];
    $options['content'] = $article['content'];
    $options['category_id'] = $article['category_id'];
    $options['status'] = $article['status'];
    $options['image'] = $article['image'];
    
    if (isset($_POST['submit'])) {
      $date = date("d F, Y");
      $options['title'] = $_POST['title'];
      $options['description'] = $_POST['description'];
      $options['content'] = $_POST['content'];
      $options['category_id'] = $_POST['category_id'];
      $options['status'] = $_POST['status'];
      
      if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imageName = md5($_FILES['image']['name']) .'.jpg';
        $options['image'] = $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] ."/upload/images/articles/" .$imageName);
      }
      
      $errors = false;
      
      if (!isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['content'])) {
        $errors[] = 'Заполните все обязательные поля';
      }
      if ($errors == false) {
        Article::updateArticle($id,$options);
        header('Location: /admin/articles');
      }
    }
    require_once(ROOT . '/views/admin_article/update.php');
    return true;
  }
  
  public static function actionDelete($id)
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    self::checkAdmin();
    if (isset($_POST['submit'])) {
      
      $article = Article::getArticleById($id);
      $articleImage = $article['image'];
      
      Article::deleteArticleById($id);
      header('Location: /admin/articles');
      unlink($_SERVER['DOCUMENT_ROOT'] ."/upload/images/articles/" .$articleImage);
    }
    require_once(ROOT . '/views/admin_article/delete.php');
    return true;
  }
}