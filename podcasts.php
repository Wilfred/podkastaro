<?php
require_once('simplepie.inc');
function get_podcast($adreso) {
  // fetch the feed, everything default
  $feed = new SimplePie();
  $feed->set_cache_duration(60*60*6); //6 hours
  $feed->set_feed_url($adreso);
  $feed->init();
  $feed->handle_content_type();

  print '<div class="dekstre">';

  $name = $feed->get_title();
  //get and print 7 items
  foreach ($feed->get_items(0, 7) as $item) {
    print_episode($name, $item->get_title(), $item->get_description(), $item->get_enclosure()->get_link());
  }

  print '</div>';
}

function print_episode($name, $title, $description, $mp3) {
  if (strlen($description) > 0) {
    $formatted_description = 'En ĉi tiu episodo: '.$description;
  } else {
    $formatted_description = 'Neniu priskribo.';
  }
  $prepared_div = <<<EOT
<div class="programo">
<h3>$name: $title</h3>

<p>$formatted_description</p>

<object type="application/x-shockwave-flash" data="dewplayer.swf" width="200" height="20" name="dewplayerclassic">
<param name="movie" value="dewplayer.swf">
<param name="flashvars" value="mp3=$mp3">
</object>

</div>
EOT;

  print $prepared_div;
}
