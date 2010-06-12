<?php
include 'common.php';
print_header();
print_sidebar('Radio Verda');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Verda</h2>

<p>Radio Verda estas podkasto el Kanado kun du podkastistoj: Arono
  kaj Karlina. Ili elsendas novajn epizodojn proksime unu foje po du
  semajnoj.</p>

<p class="malsupre"><a href="http://radioverda.com/">Retejo</a> 
<a href="http://radioverda.squarespace.com/storage/audio/radioverda.xml">RSS</a></p>

</div>

<?php
get_podcast('http://radioverda.squarespace.com/storage/audio/radioverda.xml');
print_end_main();
print_footer();

