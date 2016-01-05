<?php
   require_once('functions.php');
   require_once('content.php');

   function init($pageId = null) {
      global $webBase; // URL root for the site.
      global $baseDir; // Filesystem root for the site.
      global $activePage; // Current page id.
      global $pageDir; // Directory containing the current page.
      global $requestURL; // Full URL for this request.
      global $pageDirURL; // URL snippet for the page.

      $requestURL = siteURL() . $_SERVER['REQUEST_URI'];
      $baseDir = preg_replace('/\/init\.php$/', '', __FILE__);
      $pageDir = preg_replace('/\/index\.php$/', '', $_SERVER['SCRIPT_FILENAME']);
      $pageDirURL = preg_replace('/\/index\.php$/', '', $requestURL);

      if ($pageId == '__main__') {
         preg_match('/^(.*)\/index\.php$/', $_SERVER['SCRIPT_NAME'], $matches);
         $webBase = siteURL() . ($matches[1] == '' ? '/' : $matches[1]);
      } elseif ($pageId == '__archive__') {
         preg_match('/^(.*)\/archive\/index\.php$/', $_SERVER['SCRIPT_NAME'], $matches);
         $webBase = siteURL() . ($matches[1] == '' ? '/' : $matches[1]);
      } else {
         preg_match('/^(.*)\/(pages|archive)\/([^\/]+)\/index\.php$/', $_SERVER['SCRIPT_NAME'], $matches);

         $webBase = siteURL() . ($matches[1] == '' ? '/' : $matches[1]);

         // Make the page id for archive pages as the same as the archive page.
         if ($matches[2] == 'archive') {
            $pageId = '__archive__';
         } else {
            $pageId = $matches[3];
         }
      }

      $activePage = $pageId;
   }
?>
