<?php
include 'common.php';
print_header();
print_sidebar('Parolu Mondo');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Parolu Mondo</h2>
<p>Parolu Mondo estas radia programo el Brazilo. Ĝi elsandas unufoje
semajne.</p>

<p class="malsupre"><a href="http://parolumondo.com/">Retejo</a>
  <a href="http://parolumondo.com/?feed=podcast">RSS</a></p>

</div>


<?php
get_podcast('http://parolumondo.com/?feed=podcast');
print_end_main();
print_footer();

