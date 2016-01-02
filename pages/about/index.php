<?php
   require_once('../../init.php');

   init();

   preContent();
?>


<div id="main">
   <div class="main-content">
      <h2 class='page-title'>About Me</h2>
      <p>My name is Eriq Augustine. I am a Cal Poly Computer Science graduate. I hail from Los Gatos, California.</p>
      <p>My technical interests include Natural Language Processing (NLP), Datamining, Databases, and Compilers. You can see my <a href="<?php echo pageLink('resources/resume.pdf'); ?>">resume</a> and <a href="<?php echo absLink('/pages/projects'); ?>">projects page</a> for a more complete listing of my technical abilities/interests.</p>
      <p>My hobbies include video games, anime, <a href="<?php echo absLink('pages/cases'); ?>">case building</a>, badminton, and learning languages. I am currently working on my Japanese and Chinese (Mandrin). I hope to expand into either Korean or Russian next.</p>
      <p>You can also check me out on <a href="http://www.linkedin.com/pub/eriq-augustine/21/539/771">Linkedin</a>.</p>
   </div>
</div>

<div id="extras">
   <img id="profileImg" src="<?php echo pageLink('resources/profile.jpg'); ?>" width='212px' />
</div>

<?php postContent(); ?>
