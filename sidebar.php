<div id="sidebar">
   <ul class="sidemenu">
      <?php
         $menuItems = array(
            array('/', 'main', 'Main'),
            array('/cpe105', 'cpe105', 'CPE 105'),
            array('/tutoring', 'tutoring', 'Tutoring'),
            array('/projects', 'projects', 'Projects'),
            array('/cases', 'cases', 'Cases'),
            array('/about', 'about', 'About')
         );

         foreach ($menuItems as $menuItem) {
            // TODO(eriq): change class name to more specific.
            $class = $thisPage == $menuItem[1] ? 'active' : '';
            $address = $webBase . $menuItem[0];

            echo '<li><a class="' . $class . '" href="' . $address . '">' . 
                 $menuItem[2] . '</a></li>';
         }
      ?>
   </ul>
</div>
