<?php
include 'common.php';
print_header();
print_sidebar('esPodkasto');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>esPodkasto</h2>

<p>esPodkasto estis podkasto el Svisujo. Karlo, la podkastisto,
  kreis ĝin kaj elsendis dum 2005.</p>

<p class="malsupre"><a href="http://esperan.to/podkasto/">Retejo</a> 
<a href="http://fsu.ch/podkasto/espodkasto.xml">RSS</a></p>

</div>

<?php
  get_podcast('http://fsu.ch/podkasto/espodkasto.xml', 'esPodkasto');
print_end_main();
print_footer();

