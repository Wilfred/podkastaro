<?php
include 'common.php';
print_header();
print_sidebar('Radio Vatikana');
  
include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Vatikana</h2>
<p>Radio Vatikana estas podkasto.</p>
<p class="malsupre"><a href="http://radio-vatikana-esperanto.org/">Retejo</a></p>
</div>

<?php
get_multi_podcast(array('http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_1',
			'http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_2'));
print_end_main();
print_footer();

