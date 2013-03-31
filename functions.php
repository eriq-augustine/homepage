<?php
   function ls($dir, $skip_dots = true) {
      $files = array();

      if (!($handle = opendir($dir))) {
         return $files;
      }

      while (false !== ($file = readdir($handle))) {
         if (!$skip_dots || ($file !== "." && $file !== "..")) {
            $files[] = $file;
         }
      }

      closedir($handle);

      return $files;
   }

   function linkFilesInDir($dir, $sort = true, $skip_dots = true) {
      $files = ls($dir, $skip_dots);

      if ($sort) {
         sort($files);
      }

      foreach ($files as $file) {
         echo "<li><a href=\"$dir/$file\">$file</a></li>";
      }
   }

   function compileDatasets($dir) {
      $datasets = ls($dir);

      foreach ($datasets as $dataset) {
         echo "<div class='dataset'>";

         echo "<h3>" . $dataset . "</h3><ul>";
         linkFilesInDir($dir . "/" . $dataset);

         echo "</ul></div>";
      }
   }
?>
