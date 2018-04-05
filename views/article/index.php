<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

  <article class="row format-standard">

    <div class="s-content__header col-full">
      <h1 class="s-content__header-title">
        <?php echo $article['title']; ?>
      </h1>
      <ul class="s-content__header-meta">
        <li class="date"><?php echo $article['date']; ?></li>
        <li class="cat">
          In
          <?php if (is_array($categoriesList)): ?>
            <?php foreach ($categoriesList as $category): ?>
              <?php if ($category['id'] == $article['category_id']): ?>
                <a href="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </li>
      </ul>
    </div> <!-- end s-content__header -->
    
    <?php if ($article['image']): ?>
      <div class="s-content__media col-full">
        <div class="s-content__post-thumb">
          <img src="<?php echo "/upload/images/articles/" . $article['image']; ?>"
               alt="">
        </div>
      </div> <!-- end s-content__media -->
    <?php endif; ?>

    <div class="col-full s-content__main">
      
      <?php echo $article['content']; ?>

  </article>


  <!-- comments
  ================================================== -->
  <div class="comments-wrap">

    <div id="comments" class="row">
      <div class="col-full">
        <?php include_once(ROOT.'/views/comment/index.php'); ?>
        <?php include_once(ROOT.'/views/comment/create.php'); ?>
      </div> <!-- end col-full -->

    </div> <!-- end row comments -->
  </div> <!-- end comments-wrap -->

</section> <!-- s-content -->


<!-- s-extra
================================================== -->
<section class="s-extra">

  <div class="row top">

    <div class="col-eight md-six tab-full popular">
      <h3>Popular Posts</h3>

      <div class="block-1-2 block-m-full popular__posts">
        <article class="col-block popular__post">
          <a href="#0" class="popular__thumb">
            <img src="../../template/images/thumbs/small/wheel-150.jpg" alt="">
          </a>
          <h5><a href="#0">Visiting Theme Parks Improves Your Health.</a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
            <span class="popular__date"><span>on</span> <time datetime="2017-12-19">Dec 19, 2017</time></span>
          </section>
        </article>
        <article class="col-block popular__post">
          <a href="#0" class="popular__thumb">
            <img src="../../template/images/thumbs/small/shutterbug-150.jpg" alt="">
          </a>
          <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
            <span class="popular__date"><span>on</span> <time datetime="2017-12-18">Dec 18, 2017</time></span>
          </section>
        </article>
        <article class="col-block popular__post">
          <a href="#0" class="popular__thumb">
            <img src="../../template/images/thumbs/small/cookies-150.jpg" alt="">
          </a>
          <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
          </section>
        </article>
        <article class="col-block popular__post">
          <a href="#0" class="popular__thumb">
            <img src="../../template/images/thumbs/small/beetle-150.jpg" alt="">
          </a>
          <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
          </section>
        </article>
        <article class="col-block popular__post">
          <a href="#0" class="popular__thumb">
            <img src="../../template/images/thumbs/small/tulips-150.jpg" alt="">
          </a>
          <h5><a href="#0">10 Interesting Facts About Caffeine.</a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
            <span class="popular__date"><span>on</span> <time datetime="2017-12-14">Dec 14, 2017</time></span>
          </section>
        </article>
        <article class="col-block popular__post">
          <a href="#0" class="popular__thumb">
            <img src="../../template/images/thumbs/small/salad-150.jpg" alt="">
          </a>
          <h5><a href="#0">Healthy Mediterranean Salad Recipes</a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
            <span class="popular__date"><span>on</span> <time datetime="2017-12-12">Dec 12, 2017</time></span>
          </section>
        </article>
      </div> <!-- end popular_posts -->
    </div> <!-- end popular -->

    <div class="col-four md-six tab-full about">
      <h3>About Philosophy</h3>

      <p>
        Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id
        orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut
        lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
      </p>

      <ul class="about__social">
        <li>
          <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        </li>
      </ul> <!-- end header__social -->
    </div> <!-- end about -->

  </div> <!-- end row -->

  <div class="row bottom tags-wrap">
    <div class="col-full tags">
      <h3>Tags</h3>

      <div class="tagcloud">
        <a href="#0">Salad</a>
        <a href="#0">Recipe</a>
        <a href="#0">Places</a>
        <a href="#0">Tips</a>
        <a href="#0">Friends</a>
        <a href="#0">Travel</a>
        <a href="#0">Exercise</a>
        <a href="#0">Reading</a>
        <a href="#0">Running</a>
        <a href="#0">Self-Help</a>
        <a href="#0">Vacation</a>
      </div> <!-- end tagcloud -->
    </div> <!-- end tags -->
  </div> <!-- end tags-wrap -->

</section> <!-- end s-extra -->

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
