<?php require_once(ROOT . '/views/layouts/header.php'); ?>

  <section>
    <div class="container">
      <div class="row">

        <div class="col-sm-4 col-sm-offset-4 padding-right">
          
          <?php if ($result): ?>
            <p>Вы зарегистрированы!</p>
          <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
              <ul>
                <?php foreach ($errors as $error): ?>
                  <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <div class="signup-form"><!--sign up form-->
              <h2 style="color: #ffffff;">Регистрация</h2>
              <form action="#" method="post">
                <input style="color: #ffffff;" type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                <input style="color: #ffffff;" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                <input style="color: #ffffff;" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                <input style="color: #ffffff;" type="submit" name="submit" class="btn btn-default" value="Регистрация"/>
              </form>
            </div><!--/sign up form-->
          
          <?php endif; ?>
          <br/>
          <br/>
        </div>
      </div>
    </div>
  </section>


<?php require_once(ROOT . '/views/layouts/footer.php'); ?>