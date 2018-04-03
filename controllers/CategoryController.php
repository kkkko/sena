<?php

include_once(ROOT . '/models/Category.php');
include_once(ROOT . '/models/Artticle.php');
include_once(ROOT . '/models/User.php');
include_once(ROOT . '/components/Pagination.php');

class CategoryController
{
  
  public function actionIndex()
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
  
    require_once(ROOT . '/views/category/index.php');
    return true;
  }
  
  public function actionView($categoryId, $page = 1)
  {
    
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
    
    $articleList = array();
    $articleList = Article::getArticleListByCategory($categoryId, $page);
    
    $total = Article::getTotalArticleListInCategory($categoryId);
    
    $pagination = new Pagination($total, $page, Article::SHOW_BY_DEFAULT, 'page-');
    
    require_once(ROOT . '/views/category/category-single.php');
    return true;
  }
}