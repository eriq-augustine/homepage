<div id="sidebar">
   <ul class="sidemenu">
      <?php
         $menuItems = array(
            array('/', 'main', 'Main'),
            array('/cpe101-winter14', 'cpe101', 'CPE 101'),
            array('/cpe102-winter16', 'cpe102', 'CPE 102'),
            array('/cpe105', 'cpe105', 'CPE 105'),
            array('/csc141-spring15', 'csc141', 'CSC 141'),
            array('/cpe365', 'cpe365', 'CPE 365'),
            array('/tutoring', 'tutoring', 'Tutoring'),
            array('/projects', 'projects', 'Projects'),
            array('/cases', 'cases', 'Cases'),
            array('/about', 'about', 'About')
         );

         foreach ($menuItems as $menuItem) {
            // TODO(eriq): change class name to more specific.
            $class = $this_page == $menuItem[1] ? 'active-item' : '';
            $address = $webBase . $menuItem[0];

            echo '<li><a class="' . $class . '" href="' . $address . '">' . 
                 $menuItem[2] . '</a></li>';
         }
      ?>
   </ul>
</div>
