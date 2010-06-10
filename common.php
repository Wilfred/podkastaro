<?php

function print_header() {
  $header = <<<EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>Podkastaro: Esperantaj Podkastoj Por La Mondo</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11973220-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<style type="text/css">
.chio {
position: relative;
margin-left: auto;
margin-right: auto;
width: 47em;
}
.maldekstre {
position: absolute;
left: 0;
width: 10em;
}
.dekstre {
position: absolute;
right: 0;
width: 35em;
text-align: justify;
}
.titolo {
}
.titolo h1 {
text-align: right;
font-family: Serif;
font-size: 400%;
font-family: "Hoefler Text", serif;
font-style: italic;
margin: 0;
}
.titolo h2 {
text-align: right;
font-family: Serif;
font-size: 150%;
font-family: "Hoefler Text", serif;
font-style: italic;
color: gray;
margin: 0;
}


.maldekstre ul {
list-style-type: none;
text-align: right;
padding-left: 0;
}
.maldekstre li {
padding-bottom: 0.5em;
}

a {
color: green;
  text-decoration: none;
}
</style>


</head>

<body>

<div class="chio">
<div class="titolo">
<h1>podkastaro</h1>
<h2>esperantaj podkastoj por la mondo</h2>
</div>
EOT;

  print $header;
}

function print_sidebar($current_page) {
  $sources = array('Ĉiuj', 'Radio Verda', 'Pola Radio', 'Varsovia Vento', 'Parolu Mondo',
		   '3ZZZ Radio', 'Radio Havana Kubo', 'esPodkasto',
		   'Radio Esperanto', 'Radio Aktiva');
  print '<div class="maldekstre">';
  print '<ul>';
  foreach($sources as $source) {
    if ($current_page == $source) {
      print '<li><strong>'.$source.'</strong>';
    } else {
      // convert A B -> a_b.php
      if ($source == 'Ĉiuj') {
	$link = 'index.php';
      } else {
	$link = str_replace(" ", "-", strtolower($source)).'.php';
      }
      print '<li><a href="'.$link.'">'.$source.'</a>';
    }
  }
  print '</ul>';
  print '</div>';
}

function print_footer() {
  $footer = <<<EOT
</div>

</body>

</html>
EOT;
  print $footer;
}