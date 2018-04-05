<?php

include_once(ROOT . '/models/Artticle.php');
include_once(ROOT . '/models/Comment.php');
include_once(ROOT . '/models/Category.php');
include_once(ROOT . '/models/User.php');

class ArticleController
{
  public function actionIndex()
  {
    echo 'actionIndex в ArticleController // Список статей';
    
    $articleList = Article::getArticleList();
    
    echo '<pre>';
    foreach ($articleList as $articleItem) {
      echo $articleItem['id'];
      echo '<br>';
      echo $articleItem['content'];
      echo '<br>';
    }
    echo '</pre>';
    
    return true;
  }
  
  public function actionView($id)
  {
    $categoriesList = array();
    $categoriesList = Category::getCategoriesList();
  
    $commentsList = array();
    $commentsList = Comment::getCommentList($id);
    
    $article = Article::getArticleById($id);
    require_once(ROOT . '/views/article/index.php');
    return true;
  }
  
  
}