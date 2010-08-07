<?php
include 'common.php';
print_header();
print_sidebar('Radio Esperanto');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Esperanto de La Ondo</h2>

<p>La Ondo estas rusia gazeto kiu elsendas podkastojn. Ĝi temas pri
  tekstoj el La Ondo, literaturo, historio kaj muziko.</p>

<p class="malsupre"><a href="http://la-ondo.rpod.ru/">Retejo</a> 
<a href="http://la-ondo.rpod.ru/rss.xml">RSS</a></p>

</div>

<?php
  get_podcast('http://la-ondo.rpod.ru/rss.xml', 'Radio Esperanto');
print_end_main();
print_footer();

