<?php
require_once('simplepie.inc');
function get_podcast($adreso) {
  // fetch the feed, everything default
  $feed = new SimplePie();
  $feed->set_feed_url($adreso);
  $feed->init();
  $feed->handle_content_type();

  $name = $feed->get_title();
  $total = 0;
  foreach ($feed->get_items() as $item) {
    print_episode($name, $item->get_title(), $item->get_description(), $item->get_enclosure()->get_link());
    $total++;
    if ($total > 6) {
      break;
    }
  }
}

function print_episode($name, $title, $description, $mp3) {
  $prepared_div = <<<EOT
<div id="programo">
<h3>$name: $title</h3>

<p>En ĉi tiu episodo: $description.</p>

<object type="application/x-shockwave-flash" data="dewplayer.swf" width="200" height="20" id="dewplayerclassic" name="dewplayerclassic">
<param name="movie" value="dewplayer.swf">
<param name="flashvars" value="mp3=$mp3">
</object>

</div>
EOT;

  echo($prepared_div);
}
