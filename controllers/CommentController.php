<?php
include_once(ROOT . '/models/User.php');
include_once(ROOT . '/models/Comment.php');

class CommentController
{
  public function actionCreate($id)
  {
    $userId = User::checkLogged();
    if ($userId) {
      
      if (isset($_POST['submit'])) {
        
        $date = date("d F, Y @ H:i");
        
        $options['text'] = $_POST['text'];
        $options['date'] = $date;
        $options['article_id'] = $id;
        $options['user_id'] = $userId;
        
        $errors = false;
        
        if (!isset($_POST['text']) || strlen($_POST['text']) == 0) {
          $errors[] = 'Введите текст комментария';
          header('Location: /article/' . $id);
        }
        if ($errors == false) {
          $comment = Comment::createComment($options);
          header('Location: /article/' . $id);
        }
      }
      return true;
    }
  }
  
  public static function actionDelete($articleId, $commentId)
  {
    
    if (isset($_POST['submit'])) {
      
      Comment::deleteComment($commentId);
      header('Location: /article/' . $articleId);
    }
    return true;
  }
}