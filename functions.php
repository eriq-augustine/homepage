<?php
   function absLink($link) {
      global $webBase;
      return $webBase . '/' . preg_replace('/^\//', '', $link);
   }

   function absPath($path) {
      global $baseDir;
      return joinPath($baseDir, $path);
   }

   function pageLink($link) {
      global $pageDirURL;
      return $pageDirURL . '/' . preg_replace('/^\//', '', $link);
   }

   function pagePath($path) {
      global $pageDir;
      return joinPath($pageDir, $path);
   }

   function fetchMetadata($file) {
      $metadata = array();
      include($file);
      return $metadata;
   }

   function parsePages($pageBasePath = 'pages') {
      global $baseDir;

      $pageBaseDir = joinPath($baseDir, $pageBasePath);

      $menuItems = array();

      $pageDirs = ls($pageBaseDir, true, true);

      foreach ($pageDirs as $pageDir) {
         $metaFile = joinPath($pageBaseDir, $pageDir, 'meta.php');
         $indexFile = joinPath($pageBaseDir, $pageDir, 'index.php');

         if (!file_exists($metaFile)) {
            error_log("Metadata file does not exist: " . $metaFile);
            continue;
         }

         if (!file_exists($indexFile)) {
            error_log("Index file does not exist: " . $indexFile);
            continue;
         }

         $metadata = fetchMetadata($metaFile);

         $menuItems[] = array(
            'page' => $pageBasePath . '/' . $pageDir . '/' . 'index.php',
            'id' => $pageDir,
            'display' => $metadata['display_name']
         );
      }

      // Sort based on the display name.
      usort($menuItems, function($a, $b) {
         return ($a['display'] < $b['display']) ? -1 : 1;
      });

      return $menuItems;
   }

   function ls($dir, $skip_dots = true, $only_dirs = false) {
      $files = array();

      if (!($handle = opendir($dir))) {
         return $files;
      }

      while (false !== ($file = readdir($handle))) {
         if ((!$skip_dots || ($file !== "." && $file !== ".."))
             && (!$only_dirs || is_dir(joinPath($dir, $file)))) {
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

   function siteURL() {
      $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
      $domainName = $_SERVER['HTTP_HOST'];
      return $protocol.$domainName;
   }

   /**
   * Takes one or more file names and combines them, using the correct path separator for the
   *         current platform and then return the result.
   * Example: joinPath('/var','www/html/','try.php'); // returns '/var/www/html/try.php'
   * Link: http://www.bin-co.com/php//scripts/filesystem/join_path/
   */
   function joinPath() {
      $path = '';
      $arguments = func_get_args();
      $args = array();
      foreach($arguments as $a) if($a !== '') $args[] = $a;//Removes the empty elements

      $arg_count = count($args);
      for($i=0; $i<$arg_count; $i++) {
	 $folder = $args[$i];

	 //Remove the first char if it is a '/' - and its not in the first argument
	 if($i != 0 and $folder[0] == DIRECTORY_SEPARATOR) $folder = substr($folder,1);

	 //Remove the last char - if its not in the last argument
	 if($i != $arg_count-1 and substr($folder,-1) == DIRECTORY_SEPARATOR) $folder = substr($folder,0,-1);

	 $path .= $folder;
	 if($i != $arg_count-1) $path .= DIRECTORY_SEPARATOR; //Add the '/' if its not the last element.
      }
      return $path;
   }
?>
