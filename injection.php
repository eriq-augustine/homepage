<?php
   include("meta.php");
?>

<body>
   <?php
      // Connecting, selecting database
      //$link = mysql_connect('csc-db0.csc.calpoly.edu', 'eaugusti', 'funfun') or die('Could not connect: ' . mysql_error());
      $link = mysql_connect('localhost', '', '') or die('Could not connect: ' . mysql_error());

      //mysql_select_db('eaugusti') or die('Could not select database');
      mysql_select_db('test') or die('Could not select database');

      // Performing SQL query
      $query = "SELECT " . $_GET['attrs'] . " FROM Users WHERE username = '" . $_GET['user'] . "'";
      $result = mysql_query($query) or die('MySQL Error: ' . mysql_error());

      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
         echo "<table>";
         foreach (split(',', $_GET['attrs']) as $attr) {
            echo " <tr><td style='padding-right: 30px;'>" . $attr . ":</td><td>" . $row[$attr] . "</td></tr>";
         }
         echo "</table>";
         echo "<hr />";
      }

      // Free resultset
      mysql_free_result($result);

      // Closing connection
      mysql_close($link);
   ?>
</body>
</html>
