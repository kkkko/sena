<?php
include_once(ROOT . '/components/AdminBase.php');
include_once(ROOT . '/models/Category.php');
include_once(ROOT . '/models/Artticle.php');
include_once(ROOT . '/components/Pagination.php');

class AdminController extends AdminBase
{
  public static function actionIndex()
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    self::checkAdmin();
    require_once(ROOT . '/views/admin/index.php');
    return true;
  }
  
  public static function actionAdminArticleIndex($page = 1)
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    self::checkAdmin();
    $articleList = Article::getArticleListAdmin($page);
    $total = Article::getTotalArticleList();
    
    $pagination = new Pagination($total, $page, Article::SHOW_BY_DEFAULT, 'page-');
    
    require_once(ROOT . '/views/admin_article/index.php');
    return true;
  }
  
  public static function actionArticleCreate()
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
        
        $imageName = md5($_FILES['image']['name']) . '.jpg';
        $imageThumbName = md5($_FILES['image']['name']) . '-thumb.jpg';
        
        $options['image'] = $imageName;
        $options['image_thumb'] = $imageThumbName;
        
        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/" . $imageName);
        
        self::createThumb($_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/" . $imageName, 'true', 320, 320);
        
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
  
  public static function createThumb($path, $save, $width, $height)
  {
    
    $info = getimagesize($path); //получаем размеры картинки и ее тип
    $size = array($info[0], $info[1]); //закидываем размеры в массив
    
    //В зависимости от расширения картинки вызываем соответствующую функцию
    if ($info['mime'] == 'image/png') {
      $src = imagecreatefrompng($path); //создаём новое изображение из файла
    } else if ($info['mime'] == 'image/jpeg') {
      $src = imagecreatefromjpeg($path);
    } else if ($info['mime'] == 'image/gif') {
      $src = imagecreatefromgif($path);
    } else {
      return false;
    }
    
    $thumb = imagecreatetruecolor($width, $height); //возвращает идентификатор изображения, представляющий черное изображение заданного размера
    $src_aspect = $size[0] / $size[1]; //отношение ширины к высоте исходника
    $thumb_aspect = $width / $height; //отношение ширины к высоте аватарки
    
    if ($src_aspect < $thumb_aspect) {        //узкий вариант (фиксированная ширина)      $scale = $width / $size[0];         $new_size = array($width, $width / $src_aspect);        $src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2); //Ищем расстояние по высоте от края картинки до начала картины после обрезки   } else if ($src_aspect > $thumb_aspect) {
      //широкий вариант (фиксированная высота)
      $scale = $height / $size[1];
      $new_size = array($height * $src_aspect, $height);
      $src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0); //Ищем расстояние по ширине от края картинки до начала картины после обрезки
    } else {
      //другое
      $new_size = array($width, $height);
      $src_pos = array(0, 0);
    }
    
    $new_size[0] = max($new_size[0], 1);
    $new_size[1] = max($new_size[1], 1);
    
    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
    //Копирование и изменение размера изображения с ресемплированием
    
    if ($save === false) {
      return imagepng($thumb); //Выводит JPEG/PNG/GIF изображение
    } else {
      return imagepng($thumb, $save);//Сохраняет JPEG/PNG/GIF изображение
    }
    
  }
  
  public static function actionArticleUpdate($id)
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
        $imageName = md5($_FILES['image']['name']) . '.jpg';
        $options['image'] = $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/" . $imageName);
      }
      
      $errors = false;
      
      if (!isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['content'])) {
        $errors[] = 'Заполните все обязательные поля';
      }
      if ($errors == false) {
        Article::updateArticle($id, $options);
        header('Location: /admin/articles');
      }
    }
    require_once(ROOT . '/views/admin_article/update.php');
    return true;
  }
  
  public static function actionArticleDelete($id)
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    self::checkAdmin();
    if (isset($_POST['submit'])) {
      
      $article = Article::getArticleById($id);
      $articleImage = $article['image'];
      
      Article::deleteArticleById($id);
      header('Location: /admin/articles');
      unlink($_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/" . $articleImage);
    }
    require_once(ROOT . '/views/admin_article/delete.php');
    return true;
  }
  
}