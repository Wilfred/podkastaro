<?php
include 'common.php';
print_header();
print_sidebar('Radio ZAM');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Radio Zam</h2>

<p>Radio Zam estas dulingva (la franca kaj Esperanto) podkasto el
  Parizo. SAT-Amikaro elsendas ĝin.</p>

<p class="malsupre">
<a href="http://media.radio-libertaire.org/php/emission.rss.php?emi=59">RSS</a>
</p>

</div>

<?php
get_podcast('http://media.radio-libertaire.org/php/emission.rss.php?emi=59');
print_end_main();
print_footer();

