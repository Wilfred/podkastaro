<?php
include 'common.php';
print_header();
print_sidebar('Parolu Mondo');

include 'podcasts.php';
print_begin_main();
get_podcast('http://parolumondo.com/?feed=podcast');
print_end_main();
print_footer();

