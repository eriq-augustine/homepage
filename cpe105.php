<?php include("meta.php"); ?>
<?php $thisPage = "cpe105"; ?>
<?php $lab_dir = "105Labs"; ?>
<?php $misc_dir = "105Misc"; ?>

<body>
   <div id='page'>
      <?php include("header.php"); ?>

      <div id="content" class='center'>
         <?php include("sidebar.php"); ?>

         <div id="main">
            <div class="main-content">
               <h2>CPE 105</h2>
               <p>CPE 105 is a supplementary class for CPE 101. It is designed to give students a good foundation in computer science and programming before they move onto move advanced topics. It is a good opportunity for students to hear materal presented in a manner different than they hear it in class.</p>
               <p>This quarter (Winter 2011) I teach the section from 6pm - 7:30pm on Tuesdays and Thursdays. I usually stay to answer questions until 8pm. Any 101 student is welcome to stop by and participate or even just listen.</p>
            </div>
         </div>

         <div id="extras">
            <h2>Labs</h2>
            <ul>
               <?php
                  $files = ls($lab_dir);
                  sort($files);

                  foreach ($files as $file) {
                     echo "<li><a href=\"$lab_dir/$file\">$file</a></li>";
                  }
               ?>
            </ul>

            <h2>Other Materials</h2>
            <ul>
               <?php
                  $files = ls($misc_dir);

                  foreach ($files as $file) {
                     echo "<li><a href=\"$misc_dir/$file\">$file</a></li>";
                  }
               ?>
            </ul>
         </div>
      </div>

      <?php include("footer.php"); ?>
   </div>

</body>
</html>
