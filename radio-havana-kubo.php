<?php
include 'common.php';
print_header();
print_sidebar('Radio Havana Kubo');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Havana Kubo</h2>

<p>Radio Havana Kubo estas la oficiala radio de Havano en Kubo. Ĝi
  elsendas en naŭ lingvoj, inkluzive de Esperanto.</p>

<p class="malsupre"><a href="http://www.radiohc.cu/esperanto/">Retejo</a> 
<a href="http://www.ameriko.org/eo/rhc/feed">RSS</a></p>

</div>

<?php
  get_podcast('http://www.ameriko.org/eo/rhc/feed', 'Radio Havana Kubo');
print_end_main();
print_footer();

