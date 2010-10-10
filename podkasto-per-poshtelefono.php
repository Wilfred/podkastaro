<?php
include 'common.php';
print_header();
print_sidebar('Podkasto Per Poŝtelefono');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Podkasto Per Poŝtelefono</h2>

<p class="malsupre"><a href="http://podkastoperposhtelefono.posterous.com/">Retejo</a> 
<a href="http://podkastoperposhtelefono.posterous.com/rss.xml">RSS</a></p>

</div>

<?php
  get_podcast('http://podkastoperposhtelefono.posterous.com/rss.xml', 'Podkasto Per Poŝtelefono');
print_end_main();
print_footer();

