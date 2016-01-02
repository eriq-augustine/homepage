<?php
   require_once('../../init.php');

   init();

   preContent();

   $misc_dir = "misc";
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>CSC 102 Winter 2016</h2>
      <p>This is the official page for CPE 102 Winter 2016.</p>
      <hr />

      <div>
         <h3>Logistics</h3>
         <p>Class Time: TR 4:30 - 7:30</p>
         <p>Room: 186-C103</p>
         <p>Office Hours: 14-240 -- R 1:30 - 4:30</a>
         <p><a href='<?php echo pageLink('misc/syllabus.html'); ?>'>Syllabus</a></p>
         <p>Schedule:</p>
         <?php
            // https://docs.google.com/spreadsheets/d/1kvWE6yQ16EUGBJBLiC4-yMT0mNxadIBnqKp31JWyssI/pubhtml?gid=0&single=true
         ?>
         <iframe width='775' height='300' frameborder='0' src="https://docs.google.com/spreadsheets/d/1kvWE6yQ16EUGBJBLiC4-yMT0mNxadIBnqKp31JWyssI/pubhtml?widget=true&amp;headers=false"></iframe>
      </div>
      <hr />

      <div>
         <h3>Reference Materials</h3>
         <div class='info-area'>
         </div>

         <div class='info-area'>
            <h4>Getting Help</h4>
            <p>There are many resources for you to get help with any Computer Science related thing.</p>
            <p>
               The first resource is my office hours (listed above).
               I will be glad to help you with all your 102 related questions.
               And (as long as there is no line) any other non-102 questions.
            </p>
            <p>
               Your second resource (and one of the best options throughout your computer science career at Cal Poly) is our <a href='<?php echo absLink('pages/tutoring'); ?>'>Tutoring Center</a>.
               The Computer Science department has worked very hard to build a great staff of tutors to help you with all of your 1st and 2nd year classes.
               They offer free tutoring in 14-302 Sun-Thurs 7-9pm.
               No registration or paperwork is necessary, just go there and get help.
               Here is their site again, because it is an amazing resource:
            </p>
            <p><a href='<?php echo absLink('pages/tutoring'); ?>'>Tutoring Center Resource</a></p>
         </div>

      </div>
   </div>
</div>

<div id="extras">
   <h2>Other Materials</h2>
   <ul>
      <?php
         linkFilesInDir($misc_dir);
      ?>
   </ul>
</div>
