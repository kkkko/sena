<?php require_once(ROOT . '/views/layouts/header.php'); ?>

  <div class="pageheader-content row">
    <div class="col-full">

      <div class="featured">

        <div class="featured__column featured__column--big">
          <div class="entry"
               style="background-image:url('<?php echo '../upload/images/articles/' . $featuredArticles[0]['image']; ?>');">

            <div class="entry__content">
              <span class="entry__category"><?php if (is_array($categoriesList)): ?>
                  <?php foreach ($categoriesList as $category): ?>
                    <?php if ($category['id'] == $featuredArticles[0]['category_id']): ?>
                      <a href="category/<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </span>

              <h1><a href="/article/<?php echo $featuredArticles[0]['id']; ?>"
                     title=""><?php echo $featuredArticles[0]['title']; ?></a>
              </h1>

              <div class="entry__info">
                <a href="#0" class="entry__profile-pic">
                  <img class="avatar" src="../../template/images/avatars/user-03.jpg" alt="">
                </a>

                <ul class="entry__meta">
                  <li><a href="#0">John Doe</a></li>
                  <li><?php echo $featuredArticles[0]['date']; ?></li>
                </ul>
              </div>
            </div> <!-- end entry__content -->

          </div> <!-- end entry -->
        </div> <!-- end featured__big -->

        <div class="featured__column featured__column--small">
          <?php for ($i = 1; $i < 3; $i++): ?>

            <div class="entry"
                 style="background-image:url('<?php echo '../upload/images/articles/' . $featuredArticles[$i]['image']; ?>');">

              <div class="entry__content">
                <?php if (is_array($categoriesList)): ?>
                  <?php foreach ($categoriesList as $category): ?>
                    <?php if ($category['id'] == $featuredArticles[$i]['category_id']): ?>
                      <span class="entry__category"><a
                          href="category/<?php echo $featuredArticles[$i]['category_id']; ?>"><?php echo $category['title']; ?></a></span>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>

                <h1><a href="/article/<?php echo $featuredArticles[$i]['id']; ?>"
                       title=""><?php echo $featuredArticles[$i]['title']; ?></a></h1>

                <div class="entry__info">
                  <a href="#0" class="entry__profile-pic">
                    <img class="avatar" src="../../template/images/avatars/user-03.jpg" alt="">
                  </a>

                  <ul class="entry__meta">
                    <li><a href="#0">John Doe</a></li>
                    <li><?php echo $featuredArticles[$i]['date']; ?></li>
                  </ul>
                </div>
              </div> <!-- end entry__content -->

            </div> <!-- end entry -->
          <?php endfor; ?>

        </div> <!-- end featured__small -->
      </div> <!-- end featured -->

    </div> <!-- end col-full -->
  </div> <!-- end pageheader-content row -->

  </section> <!-- end s-pageheader -->


  <!-- s-content
  ================================================== -->
  <section class="s-content">

    <div class="row masonry-wrap">
      <div class="masonry">

        <div class="grid-sizer"></div>
        
        <?php foreach ($articleList as $article): ?>
          <article class="masonry__brick entry format-standard" data-aos="fade-up">
  
            <?php if ($article['image']): ?>
              <div class="entry__thumb">
                <a href="article/<?php echo $article['id']; ?>" class="entry__thumb-link">
                  <img src="<?php echo "/upload/images/articles/" . $article['image']; ?>" alt="">
                </a>
              </div>
            <?php endif; ?>

            <div class="entry__text">
              <div class="entry__header">

                <div class="entry__date">
                  <a href="/article/<?php echo $article['id']; ?>"><?php $article['date']; ?></a>
                </div>
                <h1 class="entry__title"><a href="/article/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h1>

              </div>
              <div class="entry__excerpt">
                <p>
                  <?php echo $article['description']; ?>
                </p>
              </div>
              <div class="entry__meta">
                            <span class="entry__meta-links">
                              <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                  <?php if ($category['id'] == $article['category_id']): ?>
                                    <span class="entry__category"><a
                                        href="category/<?php echo $article['category_id']; ?>"><?php echo $category['title']; ?></a></span>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </span>
              </div>
            </div>

          </article> <!-- end article -->
        <?php endforeach; ?>

      </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

<!--    <div class="row">-->
<!--      <div class="col-full">-->
<!--        <nav class="pgn">-->
<!--          <ul>-->
<!--            <li><a class="pgn__prev" href="#0">Prev</a></li>-->
<!--            <li><a class="pgn__num" href="#0">1</a></li>-->
<!--            <li><span class="pgn__num current">2</span></li>-->
<!--            <li><a class="pgn__num" href="#0">3</a></li>-->
<!--            <li><a class="pgn__num" href="#0">4</a></li>-->
<!--            <li><a class="pgn__num" href="#0">5</a></li>-->
<!--            <li><span class="pgn__num dots">…</span></li>-->
<!--            <li><a class="pgn__num" href="#0">8</a></li>-->
<!--            <li><a class="pgn__next" href="#0">Next</a></li>-->
<!--          </ul>-->
<!--        </nav>-->
<!--      </div>-->
<!--    </div>-->

  </section> <!-- s-content -->


<?php require_once(ROOT . '/views/layouts/footer.php'); ?>