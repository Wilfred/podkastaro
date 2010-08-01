<?php
include 'common.php';
print_header();
print_sidebar('Tuj');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Tuj</h2>

<p class="malsupre"><a href="http://tuj.esperanto.org.au/">Retejo</a> 
<a href="http://tuj.esperanto.org.au/tuj.xml">RSS</a></p>

</div>

<?php
get_podcast('http://tuj.esperanto.org.au/tuj.xml');
print_end_main();
print_footer();

