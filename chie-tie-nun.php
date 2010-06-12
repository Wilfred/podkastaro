<?php
include 'common.php';
print_header();
print_sidebar('Ĉie Tie Nun');

include 'podcasts.php';
print_begin_main();
get_podcast('http://zervic.com/chitienun.xml');
print_end_main();
print_footer();

