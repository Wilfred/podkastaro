<?php
require_once('simplepie.class.php');

function get_multi_podcast($podcasts) {
  $episodes = array();
  foreach($podcasts as $podcast) {
    $feed = new SimplePie();
    $feed->set_cache_duration(60*60*12); //12 hours
    $feed->set_feed_url($podcast);
    $feed->init();
    $feed->handle_content_type();
    
    $episodes = array_merge($episodes, $feed->get_items(0,5));
  }

  usort($episodes, "compare_episode");

  for($i=0; $i < sizeof($episodes) && $i < 6; $i++) {
    print_episode($episodes[$i]);
  }
}

function compare_episode($x, $y) {
  // for sorting by date, newest first
  $x_date = $x->get_date('U');
  $y_date = $y->get_date('U');
  if ($x_date == $y_date) {
    //use name as a tie breaker
    return strcmp($y->get_title(), $x->get_title());
  }
  return ($x_date < $y_date) ? 1 : -1;
}

function get_podcast($adreso) {
  // fetch the feed, everything default
  $feed = new SimplePie();
  $feed->set_cache_duration(60*60*12); //12 hours
  $feed->set_feed_url($adreso);
  $feed->init();
  $feed->handle_content_type();

  //get and print 7 items
  foreach ($feed->get_items(0, 7) as $item) {
    print_episode($item);
  }
}

function print_episode($episode) {
  $name = $episode->get_feed()->get_title();
  $title = $episode->get_title();
  $description = $episode->get_description();
  $mp3 = $episode->get_enclosure()->get_link();
  $date = translate_date($episode->get_local_date('%A %e %B %Y'));
  $feed_description = $episode->get_feed()->get_description();

  polish_episode($name, $title, $description, $mp3, $date, $feed_description);

  $prepared_div = <<<EOT
<div class="programo">
<h3>$name: $title</h3>

<p>$description</p>

<p><em>$date</em></p>
EOT;

  if ($mp3 == '') {
    $end_div = '</div>';
  } else {
    $end_div = <<<EOT
<object type="application/x-shockwave-flash" data="dewplayer.swf" width="200" height="20" name="dewplayerclassic">
<param name="movie" value="dewplayer.swf">
<param name="flashvars" value="mp3=$mp3">
</object>

</div>
EOT;
  }

  print $prepared_div . $end_div;
}

function polish_episode(&$name, &$title, &$description, &$mp3,
			&$date, $feed_description) {
  //make all text relating to episodes nicer

  // fix dodgy names
  if ($feed_description == 'Radio Vatikana') {
    // sadly radio vatikana doesn't say its name in its feed
    $name = 'Radio Vatikana';
  } else if ($name == 'Album Junula Radio Internacia from LaPingvino') {
    //JRI is from a RSS feed on ipernity, so rename it
    $name = 'Junula Radio Internacia';
  }

  //polish descriptions
  if (strlen($description) == 0 or $description == $title or 
      $name == 'Junula Radio Internacia') {
    // no description if no episode title or same as the station name
    $description = 'Neniu priskribo.';    
  } else if ($name == 'Varsovia Vento Elsendoj') {
    // remove junk from varsovia vento's description
    // junk takes the rough form 'Download audio file (100418vve057a.mp3) \n Elŝutu   podkaston
    $description = preg_replace("/Download audio file .*? podkaston?/is", "", $description);
    // and sometimes the junk is truncated :-/
    $description = preg_replace("/Download audio file/i", "", $description);
    $paragraphs = explode("\n\n", $description);

    // now convert line breaks into html paragraphs
    $start = True;
    foreach ($paragraphs as $paragraph) {
      if ($start) {
	$description = 'En ĉi tiu epizodo: '.$paragraph;
	$start = False;
      } else {
	$description = $description."</p>\n\n<p>".$paragraph;
      }
    }
  } else if ($name == 'Radio Verda') {
    // add trailing full stop
    $description = 'En ĉi tiu epizodo: '.$description.'.';
  } else {
    // default
    $description = 'En ĉi tiu epizodo: '.$description;
  }

}

function translate_date($english_date) {
  //set up vocabulary:
  $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday',
			'Friday', 'Saturday', 'Sunday');
  $esperanto_days = array('Lundo', 'Mardo', 'Merkredo', 'Ĵaŭdo',
			  'Vendredo', 'Sabato', 'Dimanĉo');
  $english_months = array('January', 'February', 'March', 'April',
			  'May', 'June', 'July', 'August',
			  'September', 'October', 'November',
			  'December');
  $esperanto_months = array('Januaro', 'Februaro', 'Marto', 'Aprilo',
			    'Majo', 'Junio', 'Julio', 'Aŭgusto',
			    'Septembro', 'Oktobro', 'Novembro',
			    'Decembro');

  // date in format: Monday 7 June 2010, may have duplicate spaces
  $date_components = preg_split("/ +/", $english_date);
  $day = str_replace($english_days, $esperanto_days, $date_components[0]);
  $number = $date_components[1];
  // esperanto month names are usually lowercase
  $month = strtolower(str_replace($english_months, $esperanto_months,
				  $date_components[2]));
  $year = $date_components[3];

  $esperanto_date = $day.', la '.$number.'-a de '.$month.' '.$year;
  return $esperanto_date;
}
