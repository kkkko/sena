<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<section class="s-content s-content--narrow s-content--no-padding-bottom" style="padding-top: 15px;">
  <div class="container">
    <div class="row" style="padding-bottom: 50px;">

      <h3>Кабинет пользователя</h3>

      <h4>Привет, <?php echo $user['name']; ?>!</h4>
      <?php if ($user['isAdmin'] == 1): ?>
        <a href="/admin">Перейти в панель администратора</a>
      <br>
      <?php endif; ?>
        <a href="/cabinet/edit">Редактировать данные</a>
      <br>

    </div>
  </div>
</section>

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
