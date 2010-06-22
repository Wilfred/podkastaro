<?php
include 'common.php';
print_header();
print_sidebar('NASKa Podkasto');

include 'podcasts.php';
print_begin_main();
get_podcast('http://esperanto.org/nask/podkasto/podkasto.rss');
print_end_main();
print_footer();

