<?php
include 'common.php';
print_header();
print_sidebar('NASKa Podkasto');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>NASKa Podkasto</h2>

<p class="malsupre"><a href="http://esperanto.org/nask/">Retejo</a> 
<a href="http://esperanto.org/nask/podkasto/podkasto.rss">RSS</a></p>

</div>

<?php
  get_podcast('http://esperanto.org/nask/podkasto/podkasto.rss',
	      'NASKa Podkasto');
print_end_main();
print_footer();

