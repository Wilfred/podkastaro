<?php
include 'common.php';
print_header();
print_sidebar('Radio ZAM');

include 'podcasts.php';
print_begin_main();
get_podcast('http://media.radio-libertaire.org/php/emission.rss.php?emi=59');
print_end_main();
print_footer();

