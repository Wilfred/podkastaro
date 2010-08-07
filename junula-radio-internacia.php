<?php
include 'common.php';
print_header();
print_sidebar('Junula Radio Internacia');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Junula Radio Internacia</h2>

<p class="malsupre"><a href="http://www.ipernity.com/doc/22890/album/45761">Retejo</a> 
<a href="http://api.ipernity.com/feed/doc?album_id=45761">RSS</a></p>

</div>

<?php
  get_podcast('http://api.ipernity.com/feed/doc?album_id=45761',
	      'Junula Radio Internacia');
print_end_main();
print_footer();

