<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/User.php');

class SiteController
{
  public function actionIndex() {
  
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    require_once(ROOT.'/views/site/index.php');
    return true;
  }
}