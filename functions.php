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

   // Read a file and parse out all the links.
   function linksInFile($filename, $sort = true) {
      $lines = file($filename);

      if ($sort) {
         sort($lines);
      }

      foreach ($lines as $line) {
         list($name, $link) = split(';', $line);
         echo "<li><a href='" . $link . "'>" . $name . "</a></li>";
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
