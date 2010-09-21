<?php
require_once('simplepie.class.php');
require_once('common.php'); // for converting to h-system

define('IS_HOME_PAGE', True);

class Episode {
  // used by sorting routine
  public $episode_name;
  public $machine_date;

  // we check this for validity, since some RSS feeds (3ZZZ radio)
  // contain entries without mp3 values
  public $mp3;

  // only used internally for printing
  private $station_name;
  private $description;
  private $pretty_date;

  public function __construct($station_name, $simplepie_item) {
    // take a simplepie Item and extract the desired info
    // we assign a station name rather than reading it from the rss
    // results are consistent and nice that way
    $this->station_name = $station_name;
    $this->episode_name = $simplepie_item->get_title();
    $this->description = $simplepie_item->get_description();
    $this->mp3 = $simplepie_item->get_enclosure()->get_link();
    // pretty is for printing, machine is for sorting
    $this->pretty_date = translate_date($simplepie_item->get_local_date('%A %e %B %Y'));
    $this->machine_date = $simplepie_item->get_date('U');

    $this->fix_ugliness();

  }

  private function fix_ugliness() {
    //make all text relating to episodes nicer

    //polish episode titles
    if ($this->station_name == 'Radio Vatikana') {
      $this->episode_name = preg_replace("/(\(dimance\))|(\(jaude\))/", "", $this->episode_name);
    }

    //polish descriptions
    if (strlen($this->description) == 0 or
	$this->description == $this->episode_name or 
	$this->station_name == 'Junula Radio Internacia' or
	$this->station_name == 'Radio Vatikana' or
	$this->station_name == 'Podkasto Per Poŝtelefono') {

      // no episode description, same as the station name
      // or never writes a useful description in their feed
      $this->description = 'Neniu priskribo.';

    } else if ($this->station_name == 'Varsovia Vento') {

      // remove junk from varsovia vento's description
      // junk takes the rough form 'Download audio file (100418vve057a.mp3) \n Elŝutu   podkaston
      $this->description = preg_replace("/Download audio file .*? podkaston?/is", "", $this->description);
      // and sometimes the junk is truncated :-/
      $this->description = preg_replace("/Download audio file/i", "", $this->description);
      $paragraphs = explode("\n\n", $this->description);

      // now convert line breaks into html paragraphs
      $start = True;
      foreach ($paragraphs as $paragraph) {
	if ($start) {
	  $this->description = 'En ĉi tiu epizodo: '.$paragraph;
	  $start = False;
	} else {
	  $this->description = $this->description."</p>\n\n<p>".$paragraph;
	}
      }

    } else if ($this->station_name == 'Radio Verda') {
      // add trailing full stop
      $this->description = 'En ĉi tiu epizodo: '.$this->description.'.';
    } else {
      // default
      $this->description = 'En ĉi tiu epizodo: '.$this->description;
    }

  }

  public function print_html($is_home_page=False) {
    if ($is_home_page) {
      $station_name = convert_to_h_system(mb_strtolower($this->station_name));
      $station_link = 'http://www.podkastaro.org/'.str_replace(" ", "-", $station_name).'.php';
      $title = '<a href="'.$station_link.'">'.$this->station_name.'</a>';
    } else {
      $title = $this->station_name;
    }

    $prepared_div = <<<EOT
<div class="programo">
<h3>$title: $this->episode_name</h3>

<p>$this->description</p>

<p><em>$this->pretty_date</em></p>
EOT;

    $finish = "</div>";

    if ($this->mp3 != "") {
      $player = <<<EOT
<object type="application/x-shockwave-flash" data="dewplayer.swf" width="200" height="20" name="dewplayerclassic">
<param name="movie" value="dewplayer.swf">
<param name="flashvars" value="mp3=$this->mp3">
</object>
EOT;
      $prepared_div = $prepared_div . $player;
    }
    $prepared_div = $prepared_div . "</div>";

    print $prepared_div;
    }
}

function get_multi_podcast($podcasts, $is_home_page=False) {
  $episodes = array();
  foreach($podcasts as $podcast) {
    $address = $podcast[0];
    $station_name = $podcast[1];
    $feed = new SimplePie();
    $feed->set_cache_duration(60*60*12); //12 hours
    $feed->set_feed_url($address);
    $feed->init();
    $feed->handle_content_type();

    // get 5 episodes starting at 0 (ie 5 most recent)
    // discarding any that don't have mp3 files
    foreach ($feed->get_items(0,5) as $episode) {
      // append each Episode to our collection so far
      $new_episode = new Episode($station_name, $episode);
      if ($new_episode->mp3 != "") {
	$episodes[] = new Episode($station_name, $episode);
      }
    }
    
  }

  // sort into chronological order, most recent first
  usort($episodes, "compare_episode");

  // print the 5 most recent episodes regardless of source
  for($i=0; $i < sizeof($episodes) && $i < 6; $i++) {
    if ($is_home_page) {
      // print links to station specific page
      $episodes[$i]->print_html(IS_HOME_PAGE);
    } else {
      // just print the episodes
      $episodes[$i]->print_html();
    }
  }
}

function compare_episode($x, $y) {
  // for sorting by date, newest first
  $x_date = $x->machine_date;
  $y_date = $y->machine_date;
  if ($x_date == $y_date) {
    //use name as a tie breaker
    return strcmp($y->episode_name, $x->episode_name);
  }
  return ($x_date < $y_date) ? 1 : -1;
}

function get_podcast($address, $station_name) {
  // fetch the feed, everything default
  $feed = new SimplePie();
  $feed->set_cache_duration(60*60*12); //12 hours
  $feed->set_feed_url($address);
  $feed->init();
  $feed->handle_content_type();

  //get and print 7 episodes
  foreach ($feed->get_items(0, 7) as $item) {
    $episode = new Episode($station_name, $item);
    $episode->print_html();
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
