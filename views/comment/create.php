<!-- respond
        ================================================== -->
<div class="respond">
  <?php if(User::isGuest()): ?>
    <h3>Войдите или зарегистрируйтесь, чтобы оставлять комментарии</h3>
  <?php else: ?>
  <h3 class="h2">Add Comment</h3>
  
  <form id="contactForm" enctype="multipart/form-data" method="post" action="<?php echo $article['id']; ?>/add_comment">
    <fieldset>
      
      <div class="message form-field">
        <textarea name="text" id="cMessage" class="full-width" placeholder="Your Message"></textarea>
      </div>
      
      <button type="submit" name="submit" class="submit btn--primary btn--large full-width">Submit</button>
    
    </fieldset>
  </form> <!-- end form -->
  <?php endif; ?>

</div> <!-- end respond -->