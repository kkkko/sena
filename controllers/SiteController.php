<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Artticle.php');
include_once(ROOT.'/models/User.php');
include_once(ROOT . '/components/Pagination.php');

class SiteController
{
  public function actionIndex($page = 1) {
  
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
  
    $articleList = Article::getArticleList();
    $featuredArticles = Article::getFeaturedArticles();
    
    require_once(ROOT.'/views/site/index.php');
    return true;
  }
  public function action404() {
    
    require_once(ROOT.'/views/site/404.php');
    return true;
  }
}