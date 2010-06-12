<?php
include 'common.php';
print_header();
print_sidebar('Pola Radio');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Pola Radio</h2>

<p>Pola Radio estas la publika radiofonia kompanio de Polujo kaj ĝi
  havas esperantajn elsendojn. Ĝi temas ĉefe pri pola novaĵoj, monda
  novaĵoj kaj intervjuoj. La prezentistoj estas Barbara kaj Gaby.</p>

<p class="malsupre"><a href="http://polskieradio.pl/eo/">Retejo</a> 
<a href="http://www.polskieradio.pl/podcast/39/podcast.xml">RSS</a></p>

</div>

<?php
get_podcast('http://www.polskieradio.pl/podcast/39/podcast.xml');
print_end_main();
print_footer();

