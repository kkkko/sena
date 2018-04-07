<!-- s-footer
================================================== -->
<footer class="s-footer">

  <div class="s-footer__main">
    <div class="row">

      <div class="col-two md-four mob-full s-footer__sitelinks">

        <h4>Quick Links</h4>

        <ul class="s-footer__linklist">
          <li><a href="/">Home</a></li>
          <li><a href="/">About</a></li>
          <li><a href="/">Contact</a></li>
          <li><a href="/">Privacy Policy</a></li>
        </ul>

      </div> <!-- end s-footer__sitelinks -->


      <div class="col-two md-four mob-full s-footer__social">

        <h4>Social</h4>

        <ul class="s-footer__linklist">
          <li><a href="#0">Facebook</a></li>
          <li><a href="#0">Instagram</a></li>
          <li><a href="#0">Twitter</a></li>
          <li><a href="#0">Pinterest</a></li>
          <li><a href="#0">Google+</a></li>
          <li><a href="#0">LinkedIn</a></li>
        </ul>

      </div> <!-- end s-footer__social -->

      <div class="col-five md-full end s-footer__subscribe">

        <h4>Our Newsletter</h4>

        <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim
          exercitationem ipsam. Culpa consequatur occaecati.</p>

        <div class="subscribe-form">
          <form id="mc-form" class="group" novalidate="true">

            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address"
                   required="">

            <input type="submit" name="subscribe" value="Send">

            <label for="mc-email" class="subscribe-message"></label>

          </form>
        </div>

      </div> <!-- end s-footer__subscribe -->

    </div>
  </div> <!-- end s-footer__main -->

  <div class="s-footer__bottom">
    <div class="row">
      <div class="col-full">
        <div class="s-footer__copyright">
          <span>© Copyright Philosophy 2018</span>
          <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
        </div>

        <div class="go-top">
          <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>
      </div>
    </div>
  </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->


<!-- preloader
================================================== -->
<div id="preloader">
  <div id="loader">
    <div class="line-scale">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</div>

<!-- Java Script
================================================== -->
<script src="/template/js/jquery-3.2.1.min.js"></script>
<script src="/template/js/plugins.js"></script>
<script src="/template/js/main.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $('form #add-comment-btn').click(function() {
      $.ajax({
        type: 'POST',
        url: '/article/<?php echo $article['id']; ?>/add_comment',
        data: $('form').serialize(),
        success: function() {
          $('.commentlist').load('/article/<?php echo $article['id']; ?> .commentlist > *');
          $('textarea').val('');
        }
      });
    })
  });
</script>

</body>

</html>