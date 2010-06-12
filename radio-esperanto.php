<?php
include 'common.php';
print_header();
print_sidebar('Radio Esperanto');

include 'podcasts.php';
print_begin_main();
get_podcast('http://la-ondo.rpod.ru/rss.xml');
print_end_main();
print_footer();

