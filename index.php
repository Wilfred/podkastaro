<?php
   include 'common.php';
   print_header();
   print_sidebar('Ĉiuj');

   include 'podcasts.php';
   // get_podcast('http://radioverda.squarespace.com/storage/audio/radioverda.xml');
   get_podcast('http://www.polskieradio.pl/podcast/39/podcast.xml');

   print_footer();

