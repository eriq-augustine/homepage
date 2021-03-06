<?php
   require_once('../../init.php');

   init();

   preContent($extraCSS = array(pageLink('resources/cpe365.css')));

   $this_page = "cpe365";
   $lab_dir = "365-files/labs";
   $lecture_dir = "365-files/lectures";
   $misc_dir = "365-files/misc";
   $log_dir = "365-files/logs";
   $csv_dir = "365-files/datasets/csv";
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>CPE 365</h2>
      <p>This is the official page for CPE 365 Spring 2013.</p>
      <hr />

      <h3>Logistics</h3>
      <p>Class Time: MWF 1 - 3</p>
      <p>Room: 14-250, 14-303</p>
      <p>Office Hours: 14-240 -- MWF 3 - 4</a>
      <p>Dabatase Server: csc-db0.calpoly.edu</a>
      <p>Schedule:</p>
      <iframe width='575' height='300' frameborder='0' src='https://docs.google.com/spreadsheet/pub?key=0AiBx3hjzTSnjdHNfY25SSkR6dEgxNUg5WEJLUGwxV3c&single=true&gid=2&output=html&widget=true'></iframe>
      <hr />

      <h3>Datasets</h3>
      <?php
         compileDatasets($csv_dir);
      ?>
      <hr />
   </div>
</div>

<div id="extras">
   <h2>Labs</h2>
   <ul>
      <?php
         linkFilesInDir($lab_dir);
      ?>
   </ul>

   <h2>Lectures</h2>
   <ul>
      <?php
         linkFilesInDir($lecture_dir);
      ?>
   </ul>

   <h2>Logs</h2>
   <ul>
      <?php
         linkFilesInDir($log_dir);
      ?>
   </ul>

   <h2>Other Materials</h2>
   <ul>
      <?php
         linkFilesInDir($misc_dir);
      ?>
   </ul>
</div>
