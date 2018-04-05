<?php require_once(ROOT . '/views/layouts/header.php'); ?>

  <section style="background-color: #f2f2f2;padding-top: 20px;">
    <div class="container">
      <div class="row">

        <div>
          
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
              <h2 style="color: #000000;text-align: center;">Регистрация</h2>
              <form action="#" method="post">
                <input style="margin: 0 auto;color: #ffffff;" type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                <input style="margin: 0 auto;color: #ffffff;" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                <input style="margin: 0 auto;color: #ffffff;" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                <input style="display: block;margin: 35px auto;color: #000000;" type="submit" name="submit" class="btn btn-default" value="Регистрация"/>
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