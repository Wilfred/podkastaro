<?php
include 'common.php';
print_header();
print_sidebar('3ZZZ Radio');

include 'podcasts.php';
print_begin_main();
get_podcast('http://melburno.org.au/3ZZZradio/feed/');
print_end_main();
print_footer();

