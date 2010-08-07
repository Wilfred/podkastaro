<?php
include 'common.php';
print_header();
print_sidebar('Radio Aktiva');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Aktiva</h2>

<p class="malsupre"><a href="http://radioaktiva.esperanto.org.uy/">Retejo</a> 
<a href="http://radioaktiva.esperanto.org.uy/?feed=podcast">RSS</a></p>

</div>

<?php
  get_podcast('http://radioaktiva.esperanto.org.uy/?feed=podcast',
	      'Radio Aktiva');
print_end_main();
print_footer();

