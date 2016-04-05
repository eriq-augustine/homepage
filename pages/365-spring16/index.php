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
      <p>This is the official page for CPE 365 Spring 2016.</p>
      <hr />

      <div>
         <h3>Logistics</h3>
         <p>Class Time: TR 1:30 - 4:30</p>
         <p>Room: 14-302</p>
         <p>Office Hours: 14-240 -- R 10:30 - 1:30 (and usually after every class)</a>
         <p><a href='<?php echo pageLink('365-files/misc/365-syllabus.pdf'); ?>'>Syllabus</a></p>
         <p>Database Server: csc-db0</a>
         <p>Schedule:</p>
         <iframe width='775' height='300' frameborder='0' src="https://docs.google.com/spreadsheets/d/1T-PYKzu_7ksM-yRmNv4QqkDzPcrM8GT5-prJjhdyJP8/pubhtml?gid=1386980443&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
      </div>
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
