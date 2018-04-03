
<?php require_once(ROOT.'/views/layouts/header.php'); ?>

<!-- s-content
    ================================================== -->
<section class="s-content">
  
  <div class="row narrow">
    <div class="col-full s-content__header" data-aos="fade-up">
      <?php foreach ($categoriesList as $category): ?>
        <?php if($category['id'] == $categoryId) echo '<h1>Category: ' .$category['title'] .'</h1>'; ?>
      <?php endforeach; ?>
      
      <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>
    </div>
  </div>
  
  <div class="row masonry-wrap">
    <div class="masonry">
      
      <div class="grid-sizer"></div>
      <?php foreach($articleList as $article): ?>
      <article class="masonry__brick entry format-standard" data-aos="fade-up">
        
        <div class="entry__thumb">
          <a href="/article/<?php echo $article['id']; ?>" class="entry__thumb-link">
            <?php if($article['image']): ?>
                  <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ."/upload/images/articles/" .$article['image']; ?>" alt="" >
            <?php endif; ?>
          </a>
        </div>
        
        <div class="entry__text">
          <div class="entry__header">
            
            <div class="entry__date">
              <a href="/article/<?php echo $article['id']; ?>">December 15, 2017</a>
            </div>
            <h1 class="entry__title"><a href="/article/<?php echo $article['id']; ?>"><?php echo $article['title'] ?></a></h1>
          
          </div>
          <div class="entry__excerpt">
            <p>
              Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...
            </p>
          </div>
          <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="/category/<?php echo $categoryId; ?>">
                                  <?php foreach ($categoriesList as $category): ?>
                                    <?php if($category['id'] == $categoryId) echo $category['title']; ?>
                                  <?php endforeach; ?>
                                </a>
                            </span>
          </div>
        </div>
      
      </article> <!-- end article -->
      <?php endforeach; ?>
    
    </div> <!-- end masonry -->
  </div> <!-- end masonry-wrap -->
  
  <div class="row">
    <div class="col-full">
      <nav class="pgn">
        <ul>
        <?php if($page > 1) {
          echo '<li><a class="pgn__prev" href="/category/' .$categoryId .'/page-' .($page - 1) .'">Prev</a></li>';
        } ?>
        <?php echo $pagination->get(); ?>
        <?php if($page < ($total / (Article::SHOW_BY_DEFAULT))) {
          echo '<li><a class="pgn__next" href="/category/' .$categoryId .'/page-' .($page + 1) .'">Next</a></li>';
        } ?>
      </nav>
    </div>
  </div>

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
        Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
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

<?php require_once(ROOT.'/views/layouts/footer.php'); ?>


