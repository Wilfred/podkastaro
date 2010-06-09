<?php
   include 'common.php';
   print_header();
   print_sidebar('Parolu Mondo');

   include 'podcasts.php';
   get_podcast('http://parolumondo.com/?feed=podcast');

   print_footer();

