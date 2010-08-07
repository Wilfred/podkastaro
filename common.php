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

<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="chio">
<div class="titolo">
<h1><a href="http://www.podkastaro.org">podkastaro</a></h1>
<h2>esperantaj podkastoj por la mondo</h2>
</div>
EOT;

  print $header;
}

function print_sidebar($current_page) {
  $pages = array('Ĉiuj', '', '3ZZZ Radio', 'esPodkasto',
		   'Ĉi Tie Nun', 'Ĉina Radio Internacia',
		   'Junula Radio Internacia', 'NASKa Podkasto',
		   'Parolu Mondo', 'Pola Radio', 'Radio Aktiva',
		   'Radio Esperanto', 'Radio Havana Kubo', 
		   'Radio Internacia', 'Radio Vatikana', 'Radio Verda',
		   'Radio ZAM', 'Tuj', 'Varsovia Vento', '', 'Pri Podkastaro');

  print '<div class="maldekstre">';
  print '<ul>';

  foreach($pages as $page) {
    if ($page == $current_page) {
      // highlight this text, don't make link
      print '<li><strong>'.$page.'</strong>';
    } else if ($page == '') {
      // draw separator by restarting list
      print '</ul><ul>';
    } else {
      // convert A B Ĉ -> a_b_%C4%89.php
      if ($page == 'Ĉiuj') {
	// link to index page
	$link = '';
      } else {
	$link = str_replace(" ", "-", convert_to_h_system(mb_strtolower($page, "UTF-8"))).'.php';
      }
      // absolute addressing to promote use of new shiny domain
      print '<li><a href="http://www.podkastaro.org/'.$link.'">'.$page.'</a>';
    }
  }

  print '</ul>';
  print '</div>';
}

function print_begin_main() {
  print '<div class="dekstre">';
}

function print_end_main() {
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

function convert_to_h_system($esperanto) {
  // convert ĉ ĵ ĝ ŝ ŭ -> ch jh gh sh u
  // (case sensitive)
  $esperanto_letters = array('ĉ', 'Ĉ', 'ĝ', 'Ĝ', 'ĵ', 'Ĵ', 'ŝ', 'Ŝ',
			     'ŭ', 'Ŭ');
  $h_system_replacements = array('ch', 'Ch', 'gh', 'Gh', 'jh', 'Jh',
				 'sh', 'Sh', 'u', 'U');
  return str_replace($esperanto_letters, $h_system_replacements, $esperanto);
}
