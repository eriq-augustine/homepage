<?php
   require_once('functions.php');

   function preContent($extraCSS = array(), $extraJS = array()) {
      head($extraCSS, $extraJS);

      echo '
         <body>
            <div id="page">
               <div id="header" class="center">
                  <div id="title">
                     <h1><a href="' . absLink("/") . '">Eriq Augustine</a></h1>
                     <p class="slogan">Computer Scientist</p>
                     <p class="subslogan">eriq.public[at]gmail.com</p>
                  </div>
               </div>

               <div id="content" class="center">
      ';

      menu();
   }

   function postContent() {
      echo '
         </div>
      ';

      foot();

      echo '
            </div>

         </body>
         </html>
      ';
   }

   function head($extraCSS, $extraJS) {
      $allCSS = array_merge(array(absLink('style/style.css')), $extraCSS);
      $allJS = array_merge(array(), $extraJS);

      echo '
         <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
         <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
         <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <meta name="description" content="Eriq Augustine\'s Personal Website" />
            <meta name="keywords" content="Eriq,Eric,Augustine" />
            <meta name="author" content="Eriq Augustine" />

            <link rel="shortcut icon" href="favicon.ico" />
            <title>Eriq Augustine</title>
      ';

      foreach ($allCSS as $key => $file) {
         echo("<link rel='stylesheet' type='text/css' media='all' href='" . $file . "' />");
      }

      foreach ($allJS as $key => $file) {
         echo "<script type='text/javascript' src='" . $file . "'></script>";
      }

      echo '
         </head>
      ';
   }

   function foot() {
      date_default_timezone_set('America/Los_Angeles');

      echo '
         <div id="footer" class="center">
            Copyright &copy; ' . date("Y") . ' <a href="' . absLink('/') . '">Eriq Augustine</a><br />
         </div>
      ';
   }

   function menu() {
      global $activePage;

      $menuItems = parsePages();

      // Add in the main page and archive.
      array_unshift($menuItems, array('page' => '/', 'id' => '__main__', 'display' => 'Main'));
      array_push($menuItems, array('page' => 'archive', 'id' => '__archive__', 'display' => 'Archive'));

      echo '
         <div id="sidebar">
            <ul class="sidemenu">
      ';

      foreach ($menuItems as $menuItem) {
         $class = $activePage == $menuItem['id'] ? 'active-item' : '';
         $address = absLink($menuItem['page']);

         echo '<li><a class="' . $class . '" href="' . $address . '">' . $menuItem['display'] . '</a></li>';
      }

      echo '
            </ul>
         </div>
      ';
   }
?>
