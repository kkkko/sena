<?php include ROOT . '/views/layouts/header_admin.php'; ?>
  
  <section class="admin-wrap">
    <div class="container">
      <div class="row">
        
        <br/>
        
        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li class="active">Управление статьями</li>
          </ol>
        </div>
  
        <h4>Удалить статью #<?php echo $id; ?></h4>
  
  
        <p>Вы действительно хотите удалить эту статью?</p>
  
        <form method="post">
          <input type="submit" name="submit" value="Удалить" />
        </form>
      
      </div>
    </div>
  </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>