<?php
   include 'common.php';
   print_header();
   print_sidebar('Radio Havana Kubo');

   include 'podcasts.php';
   get_podcast('http://www.ameriko.org/eo/rhc/feed');

   print_footer();

