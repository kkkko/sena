<?php if ($commentsList): ?>
  <div>
    <?php if (count($commentsList) == 1): ?>
      <h3 class="h2"><?php echo count($commentsList); ?> Comment</h3>
    <?php else: ?>
      <h3 class="h2"><?php echo count($commentsList); ?> Comments</h3>
    <?php endif; ?>

    <!-- commentlist -->
    <ol class="commentlist">
      <?php foreach ($commentsList as $comment): ?>
        <li class="depth-1 comment" style="position: relative;">

          <div class="comment__avatar">
            <img width="50" height="50" class="avatar" src="../../template/images/avatars/user-01.jpg" alt="">
          </div>

          <div class="comment__content">

            <div class="comment__info">
              <cite><?php echo User::getUserById($comment['user_id'])['name'] ?></cite>

              <div class="comment__meta">
                <time class="comment__time"><?php echo $comment['date']; ?></time>
                <!--            <a class="reply" href="#0">Reply</a>-->
              </div>
            </div>

            <div class="comment__text">
              <p><?php echo $comment['text']; ?></p>
            </div>

          </div>
          
          <?php if (!(User::isGuest()) && ($_SESSION['user'] == $comment['id'])): ?>
            <form method="post" action="<?php echo $article['id']; ?>/delete_comment/<?php echo $comment['id']; ?>" style="position: absolute;right: 0;top: 0;">
              <button name="submit" type="submit" style="background: transparent;
    border: 1px solid #aaa;
    padding: 5px 8px;
    text-align: center;
    font-size: 12px;
    line-height: 12px;
    height: auto;
    letter-spacing: 0;">
                X
              </button>
            </form>
          <?php endif; ?>

        </li> <!-- end comment level 1 -->
      <?php endforeach; ?>

    </ol> <!-- end commentlist -->
  </div>
<?php endif; ?>