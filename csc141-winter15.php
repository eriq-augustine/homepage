<?php
   $this_page = "cpe141";

   include("meta.php");
?>

<body>
   <div id='page'>
      <?php include("header.php"); ?>

      <div id="content" class='center'>
         <?php include("sidebar.php"); ?>

         <div id="main" class="wide">
            <div class="main-content">
               <h2 class='page-title'>CSC 141 Winter 2015</h2>
               <p>This is the official page for CPE 141 Winter 2015.</p>
               <hr />

               <div>
                  <h3>Logistics</h3>
                  <p>Class Time: TR 6 - 8</p>
                  <p>Room: 14-246</p>
                  <p>Office Hours: 14-240 -- W 6 - 9</a>
                  <p><a href='<?php echo $webBase; ?>/csc141-winter15-files/syllabus.html'>Syllabus</a></p>
                  <p>Schedule:</p>
                  <?php
                     // <iframe width='775' height='300' frameborder='0' src="https://docs.google.com/spreadsheets/d/1tczMVQa7D3fIV-snHi2PKSFZ1WRD5-t5xgE1wRZlvbE/pubhtml?widget=true&amp;headers=false"></iframe>
                  ?>
                  <iframe width='1010' height='300' frameborder='0' src="https://docs.google.com/spreadsheets/d/1tczMVQa7D3fIV-snHi2PKSFZ1WRD5-t5xgE1wRZlvbE/pubhtml?widget=true&amp;headers=false"></iframe>
               </div>
               <hr />

               <div>
                  <h3>Reference Materials</h3>
                  <div class='info-area'>
                     <p><a href='<?php echo $webBase; ?>/csc141-winter15-files/141w2015_midterm2_key.pdf'>Midterm 2 Key</a></p>
                  </div>

                  <div class='info-area'>
                     <h4>Textbook Materials</h4>
                     <p><a href='<?php echo $webBase; ?>/csc141-winter15-files/LogicalEquivalenciesToKnow.pdf'>Logical Equivalencies To Know</a></p>
                     <p><a href='<?php echo $webBase; ?>/csc141-winter15-files/Chapter8_7th_Edition_Rosen.pdf'>Chaper 8 from 7th Edition</a></p>
                  </div>

                  <div class='info-area'>
                     <h4>Getting Help</h4>
                     <p>There are many resources for you to get help with any Computer Science related thing.</p>
                     <p>
                        The first resource is my office hours (listed above).
                        I will be glad to help you with all your 141 related questions.
                        And (as long as there is no line) any other non-141 questions.
                     </p>
                     <p>
                        Your second resource (and one of the best options throughout your computer science career at Cal Poly) is our <a href='https://tutoring.csc.calpoly.edu/'>Tutoring Center</a>.
                        The Computer Science department has worked very hard to build a great staff of tutors to help you with all of your 1st and 2nd year classes.
                        They offer free tutoring in 14-302 Sun-Thurs 7-9pm.
                        No registration or paperwork is necessary, just go there and get help.
                        Here is their site again, because it is an amazing resource:
                     </p>
                     <p><a href='https://tutoring.csc.calpoly.edu/'>Tutoring Center Resource</a></p>
                  </div>

               </div>
            </div>
         </div>

      <?php include("footer.php"); ?>
   </div>

</body>
</html>
