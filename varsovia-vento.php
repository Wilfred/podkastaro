<?php
include 'common.php';
print_header();
print_sidebar('Varsovia Vento');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Varsovia Vento</h2>

<p>Varsovia Vento estas junulara esperanta klubo en Polujo. Ili
elsendas podkastojn kiu ofte temas pri muziko.</p>

<p class="malsupre"><a href="http://viavento.republika.pl/">Retejo</a> 
<a href="http://www.podkasto.net/feed/">RSS</a></p>

</div>

<?php
get_podcast('http://www.podkasto.net/feed/');
print_end_main();
print_footer();

