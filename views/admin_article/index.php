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
        
        <a href="/admin/article/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить статью</a>
        
        <h4>Список товаров</h4>
        
        <br/>
        
        <table class="table-bordered table-striped table article-list_admin">
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Краткое содержание</th>
            <th>Дата</th>
            <th>Статус</th>
            <th></th>
            <th></th>
          </tr>
          <?php foreach ($articleList as $article): ?>
            <tr>
              <td><a href="/article/<?php echo $article['id']; ?>"><?php echo $article['id']; ?></a></td>
              <td><?php echo $article['title']; ?></td>
              <td><?php echo $article['description']; ?></td>
              <td><?php echo $article['date']; ?></td>
              <td><?php if ($article['status'] == 1) {
                echo 'Опубликовано';
                } else {
                echo 'Скрыто';
                } ?></td>
              <td><a href="/admin/article/update/<?php echo $article['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
              <td><a href="/admin/article/delete/<?php echo $article['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
          <?php endforeach; ?>
        </table>
      
      </div>
    </div>
  </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>