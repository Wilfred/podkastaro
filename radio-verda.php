<?php
   include 'common.php';
   print_header();
   print_sidebar('Radio Verda');

   include 'podcasts.php';
   get_podcast('http://radioverda.squarespace.com/storage/audio/radioverda.xml');

   print_footer();

