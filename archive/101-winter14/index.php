<?php
   require_once('../../init.php');

   init();

   preContent($extraCSS = array(pageLink('resources/cpe101.css')));

   $assignments_file = "resources/assignments.txt";
   $labs_file = "resources/labs.txt";

   $lecture_dir = "lectures";
   $misc_dir = "misc";
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>CPE 101 Winter 2014</h2>
      <p>This is the official page for CPE 101 Winter 2014.</p>
      <hr />

      <div>
         <h3>Logistics</h3>
         <p>Class Time: MW 6 - 9</p>
         <p>Room: 20-129, 14-303</p>
         <p>Office Hours: 14-240 -- T 6 - 9</a>
         <p><a href='<?php echo pageLink('resources/syllabus.html'); ?>'>Syllabus</a></p>
         <p>Schedule:</p>
         <iframe width='775' height='300' frameborder='0' src='https://docs.google.com/spreadsheet/pub?key=0AiBx3hjzTSnjdGhzRERHeVhRZVJDM1BlTzQzVWpNS0E&single=true&gid=0&output=html&widget=true'></iframe>
      </div>
      <hr />

      <div>
         <h3>Reference Materials</h3>
         <div class='info-area'>
            <h4>Style</h4>
            <p><a href='<?php pageLink('misc/101-style.html'); ?>'>CPE 101 Style Guide</a></p>
         </div>

         <div class='info-area'>
            <h4>Getting Help</h4>
            <p>There are many resources for you to get help with any Computer Science related thing.</p>
            <p>
               The first resource is my office hours (listed above).
               I will be glad to help you with all your 101 related questions.
               And (as long as there is no line) any other non-101 questions.
            </p>
            <p>
               Your second resource (and one of the best options throughout your computer science career at Cal Poly) is our <a href='https://tutoring.csc.calpoly.edu/'>Tutoring Center</a>.
               The Computer Science department has worked very hard to build a great staff of tutors to help you with all of your 1st and 2nd year classes.
               They offer free tutoring in 14-302 Sun-Thurs 7-9pm.
               No registration or paperwork is necessary, just go there and get help.
               Here is their site again, because it is an amazing resource:
            </p>
            <p><a href='https://tutoring.csc.calpoly.edu/'>Tutoring Center Resource</a></p>

            <p>Professor Mammen has put together a <a href='http://users.csc.calpoly.edu/~kmammen/101/documents/howTo.html'>useful collection of How-To Documents</a></p>
            <p>Here are some that you may find useful:
               <ul class='bullet-list'>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/c/howToUseHandin.html'>handin</a></li>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/c/howToCompileAndRunCProgramsFromCommandLine.html'>Compiling</a></li>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/c/howToFixCompilerErrors.html'>Fixing Compile Errors</a></li>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/c/howToWriteAFunction.html'>Writing Test Functions</a></li>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/c/howToTestUsingRedirectionAndDiff.html'>Testing With Diff</a></li>
                  <li><a href='http://users.csc.calpoly.edu/~kmammen/documents/c/howToPreventMultipleAndCircularInclusion.html'>Preventing Multiple Inclusion</a></li>
               </ul>
            </p>
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
            <h4>C-FAQ</h4>
            <p><a href='http://c-faq.com/'>A nice FAQ on the C language</a></p>
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
               <li><a href='http://www.unix-manuals.com/tutorials/vi/vi-in-10-1.html'>Vi (Vim)</a></li>
               <li><a href='http://ergoemacs.org/emacs/emacs.html'>Emacs</a></li>
            </ul>
         </div>

         <div class='info-area'>
            <h4>Checkit</h4>
            <p>Checkit is a testing tool developed by some professors at Cal Poly.</p>
            <p>We will be extensively using checkit this quarter.<p/>
            <p>You can find more information about checkit on <a href='http://users.csc.calpoly.edu/~akeen/courses/csc101/references/test_macros.html'>Professor Keen's site</a></p>
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

   <h2>Assignments</h2>
   <ul>
      <?php
         linksInFile($assignments_file, false);
      ?>
   </ul>

   <h2>Lectures</h2>
   <ul>
      <?php
         linkFilesInDir($lecture_dir);
      ?>
   </ul>

   <h2>Other Materials</h2>
   <ul>
      <?php
         linkFilesInDir($misc_dir);
      ?>
   </ul>
</div>
