<?php
   require_once('../init.php');

   init('__archive__');

   preContent();
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>Archive</h2>
      <p>Here are pages that have been archived.</p>
      <p>Information is probably old and links will probably be broken.</p>

      <hr />

      <ul>
         <?php
            $archivePages = parsePages('archive');

            foreach ($archivePages as $archivePage) {
               echo '<li><a href="' . absLink($archivePage['page']) . '">' . $archivePage['display'] . '</a></li>';
            }
         ?>
      </ul>

   </div>
</div>

<?php postContent(); ?>
