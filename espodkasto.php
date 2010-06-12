<?php
include 'common.php';
print_header();
print_sidebar('esPodkasto');

include 'podcasts.php';
print_begin_main();
get_podcast('http://fsu.ch/podkasto/espodkasto.xml');
print_end_main();
print_footer();

