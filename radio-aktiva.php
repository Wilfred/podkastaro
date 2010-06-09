<?php
   include 'common.php';
   print_header();
   print_sidebar('Radio Aktiva');

   include 'podcasts.php';
   get_podcast('http://radioaktiva.esperanto.org.uy/?feed=podcast');

   print_footer();

