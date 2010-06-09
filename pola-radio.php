<?php
   include 'common.php';
   print_header();
   print_sidebar('Pola Radio');

   include 'podcasts.php';
   get_podcast('http://www.polskieradio.pl/podcast/39/podcast.xml');

   print_footer();

