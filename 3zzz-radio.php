<?php
include 'common.php';
print_header();
print_sidebar('3ZZZ Radio');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>3ZZZ Radio</h2>

<p>3ZZZ Radio estas stacio en Melburno, Aŭstralio. Ĝi elsendas en
  multaj lingvoj, inkluzive de Esperanto. Ili elsendas unufoje po semajno.</p>

<p class="malsupre"><a href="http://melburno.org.au/3ZZZradio/">Retejo</a> 
<a href="http://melburno.org.au/3ZZZradio/feed/">RSS</a></p>

</div>

<?php
  get_podcast('http://melburno.org.au/3ZZZradio/feed/', '3ZZZ Radio');
print_end_main();
print_footer();

