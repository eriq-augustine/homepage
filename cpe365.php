<?php include("meta.php"); ?>
<?php $this_page = "cpe365"; ?>
<?php $lab_dir = "365-files/labs"; ?>
<?php $lecture_dir = "365-files/lectures"; ?>
<?php $misc_dir = "365-files/misc"; ?>
<?php $log_dir = "365-files/logs"; ?>

<body>
   <div id='page'>
      <?php include("header.php"); ?>

      <div id="content" class='center'>
         <?php include("sidebar.php"); ?>

         <div id="main">
            <div class="main-content">
               <h2>CPE 365</h2>
               <p>This is the official page for CPE 365 Spring 2013.</p>
               <hr />

               <h3>Logistics</h3>
               <p>Class Time: MWF 12 - 2</p>
               <p>Room: 14-250, 14-303</p>
               <p>Office Hours: MWF 2 - 3</a>
               <p>Schedule:</p>
               <iframe width='575' height='300' frameborder='0' src='https://docs.google.com/spreadsheet/pub?key=0AiBx3hjzTSnjdHNfY25SSkR6dEgxNUg5WEJLUGwxV3c&single=true&gid=2&output=html&widget=true'></iframe>
               <hr />

               <h3>Datasets</h3>
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
      </div>

      <?php include("footer.php"); ?>
   </div>

</body>
</html>
