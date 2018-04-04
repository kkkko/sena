<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Artticle.php');
include_once(ROOT.'/models/User.php');

class SiteController
{
  public function actionIndex() {
  
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
  
    $articleList = Article::getArticleList();
    $featuredArticles = Article::getFeaturedArticles();
    
    require_once(ROOT.'/views/site/index.php');
    return true;
  }
}