<?php
include 'common.php';
print_header();
print_sidebar('Panama Radio');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Panama Radio</h2>

<p class="malsupre"><a href="http://panamaradio.org/">Retejo</a> 
<a href="http://www.panamaradio.org/podkastoj/rss.xml">RSS</a></p>

</div>

<?php
  get_podcast('http://www.panamaradio.org/podkastoj/rss.xml', 'Panama Radio');
print_end_main();
print_footer();

