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
?>
