<?php
include 'common.php';
print_header();
print_sidebar('Radio Aktiva');

include 'podcasts.php';
print_begin_main();
get_podcast('http://radioaktiva.esperanto.org.uy/?feed=podcast');
print_end_main();
print_footer();

