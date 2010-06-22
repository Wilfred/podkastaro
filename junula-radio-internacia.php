<?php
include 'common.php';
print_header();
print_sidebar('Junula Radio Internacia');

include 'podcasts.php';
print_begin_main();
get_podcast('http://api.ipernity.com/feed/doc?album_id=45761');
print_end_main();
print_footer();

