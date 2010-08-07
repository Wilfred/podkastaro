<?php
include 'common.php';
print_header();
print_sidebar('Ĉi Tie Nun');

include 'podcasts.php';
print_begin_main();
?>

<div class="priskribo">
<h2>Ĉi Tie Nun</h2>

<p class="malsupre"><a href="http://www.zervic.com/chitienun/">Retejo</a> 
<a href="http://zervic.com/chitienun.xml">RSS</a></p>

</div>

<?php
  get_podcast('http://zervic.com/chitienun.xml', 'Ĉi Tie Nun');
print_end_main();
print_footer();

