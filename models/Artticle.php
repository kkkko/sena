<?php

include_once(ROOT . '/components/DB.php');

class Article
{
  const SHOW_BY_DEFAULT = 9;
  
  public static function getArticleList()
  {
    
    $db = DB::getConnection();
    
    $result = $db->query('SELECT * FROM article WHERE status = 1 AND featured = 0 ORDER BY id DESC LIMIT 11');
    
    $i = 0;
    $articleList = array();
    
    while ($row = $result->fetch()) {
      $articleList[$i]['id'] = $row['id'];
      $articleList[$i]['title'] = $row['title'];
      $articleList[$i]['description'] = $row['description'];
      $articleList[$i]['content'] = $row['content'];
      $articleList[$i]['category_id'] = $row['category_id'];
      $articleList[$i]['image'] = $row['image'];
      $articleList[$i]['date'] = $row['date'];
      $i++;
    }
    return $articleList;
  }
  
  public static function getArticleListAdmin($page)
  {
  
    $page = intval($page);
    $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
    
    $db = DB::getConnection();
    
    $result = $db->query('SELECT * FROM article ORDER BY id DESC LIMIT ' .self::SHOW_BY_DEFAULT . ' OFFSET ' . $offset);
    
    $i = 0;
    $articleList = array();
    
    while ($row = $result->fetch()) {
      $articleList[$i]['id'] = $row['id'];
      $articleList[$i]['title'] = $row['title'];
      $articleList[$i]['description'] = $row['description'];
      $articleList[$i]['content'] = $row['content'];
      $articleList[$i]['image'] = $row['image'];
      $articleList[$i]['date'] = $row['date'];
      $articleList[$i]['status'] = $row['status'];
      $i++;
    }
    return $articleList;
  }
  
  public static function getFeaturedArticles()
  {
    
    $db = DB::getConnection();
  
    $result = $db->query('SELECT * FROM article WHERE featured = 1');
  
    $i = 0;
    $featuredArticles = array();
  
    while ($row = $result->fetch()) {
      $featuredArticles[$i]['id'] = $row['id'];
      $featuredArticles[$i]['title'] = $row['title'];
      $featuredArticles[$i]['description'] = $row['description'];
      $featuredArticles[$i]['content'] = $row['content'];
      $featuredArticles[$i]['category_id'] = $row['category_id'];
      $featuredArticles[$i]['image'] = $row['image'];
      $featuredArticles[$i]['date'] = $row['date'];
      $featuredArticles[$i]['status'] = $row['status'];
      $i++;
    }
    return $featuredArticles;
  }
  
  public static function getArticleById($id)
  {
    
    $db = DB::getConnection();
    
    $sql = 'SELECT * FROM article WHERE id = :id';
    
    $result = $db->prepare($sql);
    
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    
    $result->setFetchMode(PDO::FETCH_ASSOC);
    
    $result->execute();
    
    return $result->fetch();
  }
  
  public static function getArticleListByCategory($categoryId, $page)
  {
    
    $page = intval($page);
    $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
    
    $db = DB::getConnection();
    
    $result = $db->query("SELECT * FROM article WHERE category_id =" . $categoryId . " AND status = 1 ORDER BY id DESC LIMIT " . self::SHOW_BY_DEFAULT . ' OFFSET ' . $offset);
    
    $i = 0;
    $articleList = array();
    
    while ($row = $result->fetch()) {
      $articleList[$i]['id'] = $row['id'];
      $articleList[$i]['cat_id'] = $row['category_id'];
      $articleList[$i]['title'] = $row['title'];
      $articleList[$i]['description'] = $row['description'];
      $articleList[$i]['image'] = $row['image'];
      $articleList[$i]['content'] = $row['content'];
      $articleList[$i]['date'] = $row['date'];
      $i++;
    }
    return $articleList;
  }
  
  public static function getTotalArticleListInCategory($categoryId)
  {
    
    $db = DB::getConnection();
    
    $result = $db->query("SELECT count(id) AS count FROM article WHERE category_id =" . $categoryId);
    
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    
    return $row['count'];
  }
  
  public static function getTotalArticleList()
  {
    
    $db = DB::getConnection();
    
    $result = $db->query("SELECT count(id) AS count FROM article");
    
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    
    return $row['count'];
  }
  
  public static function createArticle($options)
  {
    
    $db = DB::getConnection();
    
    $sql = "INSERT INTO article (title, description, content, category_id, image, date, status)
            VALUES (:title, :description, :content, :category_id, :image, :date, :status)";
    $result = $db->prepare($sql);
    $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
    $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
    $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
    $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    
    if ($result->execute()) {
      return $db->lastInsertId();
    }
    return 0;
  }
  
  public static function updateArticle($id,$options)
  {
    
    $db = DB::getConnection();
    
    $sql = "UPDATE article SET title = :title, description = :description, content = :content, category_id = :category_id, image = :image, status = :status WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
    $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
    $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
    $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
    $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
    $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    
    if ($result->execute()) {
      return $db->lastInsertId();
    }
    return 0;
  }
  
  public static function deleteArticleById($id)
  {
    
    $db = DB::getConnection();
    
    $sql = "DELETE FROM article WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    
    return $result->execute();
  }
}

;