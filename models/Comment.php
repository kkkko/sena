<?php

class Comment
{
  const SHOW_BY_DEFAULT = 10;
  
  public static function getCommentList($articleId)
  {
    $db = DB::getConnection();
    
    $result = $db->query('SELECT * FROM comments WHERE article_id =' .$articleId .'  ORDER BY id ASC');
    
    $i = 0;
    $commentList = array();
    
    while ($row = $result->fetch()) {
      $commentList[$i]['id'] = $row['id'];
      $commentList[$i]['text'] = $row['text'];
      $commentList[$i]['user_id'] = $row['user_id'];
      $commentList[$i]['article_id'] = $row['article_id'];
      $commentList[$i]['date'] = $row['date'];
      $i++;
    }
    return $commentList;
  }
  
  public static function createComment($options)
  {
    $db = DB::getConnection();
  
    $sql = "INSERT INTO comments (text, user_id, article_id, date)
            VALUES (:text, :user_id, :article_id, :date)";
    $result = $db->prepare($sql);
    $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
    $result->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
    $result->bindParam(':article_id', $options['article_id'], PDO::PARAM_INT);
    $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
  
    if ($result->execute()) {
      return $db->lastInsertId();
    }
    return 0;
  }
  
  public static function deleteComment($id)
  {
    $db = DB::getConnection();
  
    $sql = "DELETE FROM comments WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
  
    return $result->execute();
  }
  
}