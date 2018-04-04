<?php include ROOT . '/views/layouts/header_admin.php'; ?>

  <section class="admin-wrap admin-create">
    <div class="container">
      <div class="row">

        <br/>

        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/articles">Управление статьями</a></li>
            <li class="active">Редактировать статью</li>
          </ol>
        </div>


        <h4>Добавить новую статью</h4>

        <br/>
        
        <?php if (isset($errors) && is_array($errors)): ?>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <div>
          <div class="login-form">
            <form action="#" method="post" enctype="multipart/form-data">

              <p>Название*</p>
              <input type="text" name="title" placeholder="" value="<?php echo $article['title']; ?>">

              <p>Краткое содержание*</p>
              <textarea type="text" name="description" value=""><?php echo $article['description']; ?></textarea>

              <p>Полное содержание*</p>
              <textarea type="text" name="content" value=""><?php echo $article['content']; ?></textarea>

              <p>Категория*</p>
              <select name="category_id">
                <?php if (is_array($categoriesList)): ?>
                  <?php foreach ($categoriesList as $category): ?>
                    <option
                      value="<?php echo $category['id']; ?>" <?php if ($article['category_id'] == $category['id']) {
                      echo 'selected';
                    } ?>>
                      <?php echo $category['title']; ?>
                    </option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>

              <br/>

              <p>Изображение</p>
              <?php if ($article['image']): ?>
                <img src="<?php echo "/upload/images/articles/" . $article['image']; ?>">
              <?php else: ?>
                <span>Изображение не задано</span>
              <?php endif; ?>
              <br/>
              <input type="file" name="image" placeholder="Заменить" value="">

              <br/>

              <p>Статус*</p>
              <select name="status">
                <option value="1" <?php if ($article['status'] == 1) {
                  echo 'selected="selected"';
                } ?>>Отображается</option>
                <option value="0" <?php if ($article['status'] == 0) {
                  echo 'selected="selected"';
                } ?>>Скрыто</option>
              </select>

              <br/>

              <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

              <br/>

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>