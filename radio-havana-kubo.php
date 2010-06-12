<?php
include 'common.php';
print_header();
print_sidebar('Radio Havana Kubo');

include 'podcasts.php';
print_begin_main();
get_podcast('http://www.ameriko.org/eo/rhc/feed');
print_end_main();
print_footer();

