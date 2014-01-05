<?php
   $this_page = "tutoring";
   $extraCSS = array('tutoring.css');

   include("meta.php");
?>

<body>
   <div id='page'>
      <?php include("header.php"); ?>

      <div id='content' class='center'>
         <?php include("sidebar.php"); ?>

         <div id="main">
            <div class="main-content tutoring-content">
               <h2 class='page-title'>Tutoring</h2>
               <p>I have been a tutor for over a decade and was recently head tutor for the Computer Science Department at Cal Poly.</p>
               <p>Check out the <a href="http://tutoring.csc.calpoly.edu">CSC Tutoring Center.</a> 
               <p><img src="imgs/tutoring_flyer.jpg" width='500px' align=middle /></p>
            </div>
         </div>
      </div>

      <?php include("footer.php"); ?>
   </div>

</body>
</html>
