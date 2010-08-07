<?php
include 'common.php';
print_header();
print_sidebar('Radio Vatikana');
  
include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Vatikana</h2>
<p>Radio Vatikana estas katolika radia stacio kiu elsandas en multaj
  lingvoj. Iliaj elsendoj temas pri novaĵoj (religiaj kaj sociaj) kaj
  la Papo.</p>

<p class="malsupre"><a href="http://radio-vatikana-esperanto.org/">Retejo</a>
  <a href="http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_1">RSS
  1</a> <a href="http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_2">RSS 2</a></p>

</div>

<?php
  get_multi_podcast(array(array('http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_1',
				'Radio Vatikana'),
			  array('http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_2',
				'Radio Vatikana')));
print_end_main();
print_footer();

