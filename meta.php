<?php
   /**
      Opens html.
    */

   //$webBase = "http://users.csc.calpoly.edu/~eaugusti";
   $webBase = "http://localhost:8080/homepage";
   //$webBase = "http://192.168.1.169:8080/homepage";

   include('functions.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="description" content="Eriq Augustine's Personal Website" />
   <meta name="keywords" content="Eriq,Eric,Augustine" />
   <meta name="author" content="Eriq Augustine" />

   <link rel="shortcut icon" href="favicon.ico" />
   <title>Eriq Augustine</title>

   <?php
      global $extraCSS, $extraJS;

      $extraCSS = isset($extraCSS) ? $extraCSS : array();
      $extraJS = isset($extraJS) ? $extraJS : array();

      $allCSS = array_merge(array('style.css'), $extraCSS);
      $allJS = array_merge(array(), $extraJS);

      foreach ($allCSS as $key => $file) {
         echo("<link rel='stylesheet' type='text/css' media='all' href='" .
               $webBase . "/style/" . $file . "' />");
      }

      foreach ($allJS as $key => $file) {
         echo "<script type='text/javascript' src='" .
               $webBase . "/js/" . $file . "'></script>";
      }
   ?>
</head>
