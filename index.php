<?php
   require_once('init.php');

   init('__main__');

   preContent();
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>Welcome!</h2>
      <p>Hi there. I am Eriq Augustine and this is my personal website.</p>
      <p>Feel free to look around. For more information about me check out my <a href="<?php echo absLink('pages/about'); ?>">About Section.</a></p>
   </div>
</div>

<?php postContent(); ?>
