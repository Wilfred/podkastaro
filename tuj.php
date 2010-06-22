<?php
include 'common.php';
print_header();
print_sidebar('Tuj');

include 'podcasts.php';
print_begin_main();
get_podcast('http://tuj.esperanto.org.au/tuj.xml');
print_end_main();
print_footer();

