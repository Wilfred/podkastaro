<?php
   include 'common.php';
   print_header();
   print_sidebar('Ĉie Tie Nun');

   include 'podcasts.php';
   get_podcast('http://zervic.com/chitienun.xml');

   print_footer();

