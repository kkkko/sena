<?php
include_once(ROOT.'/components/AdminBase.php');
include_once(ROOT . '/models/Category.php');
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
}