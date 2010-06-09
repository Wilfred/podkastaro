<?php
   include 'common.php';
   print_header();
   print_sidebar('Radio Esperanto');

   include 'podcasts.php';
   get_podcast('http://la-ondo.rpod.ru/rss.xml');

   print_footer();

