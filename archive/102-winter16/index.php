<?php
   require_once('../../init.php');

   init();

   preContent();

   $labs_file = "labs/labs.txt";
   $programs_file = "programs/programs.txt";
   $lecs_dir = "lectures";
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
         <p><a href='<?php echo pageLink('misc/codingStyle.html'); ?>'>Coding Style</a></p>
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

         <div class='info-area'>
            <h4>SSH Clients</h4>
            <p>Getting into the school machine from home requires an SSH client.
               (Only on Windows. Linux and Mac users can use the 'ssh' command.)
               Although I have not used it, I have heard great things about a client hosted on Professor Mammen's site.
               I have personally used Putty and find it pretty good.
               <ul class='bullet-list'>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/misc/SSHSecureShellClient329.zip'>Mammen's One</a></li>
                  <li><a href='http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html'>Putty</a></li>
               </ul>
            </p>
         </div>

         <div class='info-area'>
            <h4>UNIX Tutorials</h4>
            <p>
               Starting to learn UNIX/Linux can be a daunting task.
               There are many things to learn and it may feel very different from what you are used to.
               There are many tutorials on the internet to help you learn UNIX.
               Here are two simple ones:

               <ul class='bullet-list'>
                  <li><a href='http://www.ee.surrey.ac.uk/Teaching/Unix/'>UNIX Tutorial for Beginners</a></li>
                  <li><a href='http://people.ischool.berkeley.edu/~kevin/unix-tutorial/toc.html'>UNIX Tutorial</a></li>
               </ul>
            </p>
         </div>

         <div class='info-area'>
            <h4>Editors</h4>
            <p>
               Being familiar with a powerful text editor can make a surprising difference.
               In the programming world, there are two text editors that have stayed on the top for over 30 years.
               Vi (Vim) and Emacs are two very powerful terminal-based text editors (although both have GUI versions).
               The arguments about which one is better have been going on for decades and will never be resolved.
               In truth, they are both amazing editors and will greatly increase your productivity once you learn how to use them.
               I personally use Vim, and can help you learn if you are interested.
               There are many CS faculty who use Emacs and can help you.
               There are also many online resources for each:
            </p>
            <ul class='bullet-list'>
               <li><a href='http://www.labnol.org/internet/learning-vim-for-beginners/28820/'>Vi (Vim)</a></li>
               <li><a href='http://ergoemacs.org/emacs/emacs.html'>Emacs</a></li>
            </ul>
         </div>

      </div>
   </div>
</div>

<div id="extras">
   <h2>Labs</h2>
   <ul>
      <?php
         linksInFile($labs_file, false);
      ?>
   </ul>

   <h2>Programs</h2>
   <ul>
      <?php
         linksInFile($programs_file, false);
      ?>
   </ul>

   <h2>Lectures</h2>
   <ul>
      <?php
         linkFilesInDir($lecs_dir);
      ?>
   </ul>

   <h2>Other Materials</h2>
   <ul>
      <?php
         linkFilesInDir($misc_dir);
      ?>
   </ul>
</div>
