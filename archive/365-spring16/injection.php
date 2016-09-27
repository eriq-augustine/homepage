<html>
<body>
   <?php
      $host = 'csc-db0';
      $db = 'eaugusti';
      $user = 'eaugusti';
      $pass = 'funfun';

      /*
      $host = 'localhost';
      $db = 'test';
      $user = '';
      $pass = '';
      */

      // Connecting, selecting database
      $link = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysqli_connect_error());

      mysqli_select_db($link, $db) or die('Could not select database');

      // Performing SQL query
      $query = "SELECT " . $_GET['attrs'] . " FROM Users WHERE username = '" . $_GET['user'] . "'";
      $result = mysqli_query($link, $query) or die('MySQL Error: ' . mysqli_error($link));

      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         echo "<table>";
         foreach (split(',', $_GET['attrs']) as $attr) {
            echo " <tr><td style='padding-right: 30px;'>" . $attr . ":</td><td>" . $row[$attr] . "</td></tr>";
         }
         echo "</table>";
         echo "<hr />";
      }

      // Free resultset
      mysqli_free_result($result);

      // Closing connection
      mysqli_close($link);
   ?>
</body>
</html>
