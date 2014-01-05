<?php include("meta.php"); ?>
<?php $this_page = "cpe105"; ?>
<?php $lab_dir = "105Labs"; ?>
<?php $misc_dir = "105Misc"; ?>

<body>
   <div id='page'>
      <?php include("header.php"); ?>

      <div id="content" class='center'>
         <?php include("sidebar.php"); ?>

         <div id="main">
            <div class="main-content">
               <h2 class='page-title'>CPE 105</h2>
               <p>CPE 105 is a supplementary class for CPE 101. It is designed to give students a good foundation in computer science and programming before they move onto move advanced topics. It is a good opportunity for students to hear materal presented in a manner different than they hear it in class.</p>
               <p>This quarter (Winter 2011) I teach the section from 6pm - 7:30pm on Tuesdays and Thursdays. I usually stay to answer questions until 8pm. Any 101 student is welcome to stop by and participate or even just listen.</p>
            </div>
         </div>

         <div id="extras">
            <h2>Labs</h2>
            <ul>
               <?php
                  linkFilesInDir($lab_dir);
               ?>
            </ul>

            <h2>Other Materials</h2>
            <ul>
               <?php
                  linkFilesInDir($misc_dir);
               ?>
            </ul>
         </div>
      </div>

      <?php include("footer.php"); ?>
   </div>

</body>
</html>
