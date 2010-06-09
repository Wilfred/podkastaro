<?php
   include 'common.php';
   print_header();
   print_sidebar('esPodkasto');

   include 'podcasts.php';
   get_podcast('http://fsu.ch/podkasto/espodkasto.xml');

   print_footer();

