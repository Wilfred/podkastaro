<?php
   include 'common.php';
   print_header();
   print_sidebar('Varsovia Vento');

   include 'podcasts.php';
   get_podcast('http://www.podkasto.net/feed/');

   print_footer();

