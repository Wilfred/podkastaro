<?php
require_once('simplepie.inc');
function venigi_podkaston($adreso) {
   $feed = new SimplePie();
   $feed->set_feed_url($adreso);
   $feed->init();
   // This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
   $feed->handle_content_type();

   $nomo = $feed->get_title();
   $total = 0;
   foreach ($feed->get_items() as $item) {
       malkashi_podkaston($nomo, $item->get_title(), $item->get_description(), $item->get_enclosure()->get_link());
       $total++;
       if ($total > 6) {
           break;
       }
   }
}

function malkashi_podkaston($nomo, $titolo, $priskribo, $mp3) {
  $prepared_div = <<<EOT
<div id="programo">
<h3>$nomo: $titolo</h3>

<p>En ĉi tiu episodo: $priskribo.</p>

<object type="application/x-shockwave-flash" data="dewplayer.swf" width="200" height="20" id="dewplayerclassic" name="dewplayerclassic">
<param name="movie" value="dewplayer.swf?mp3=$mp3">
<param name="flashvars" value="mp3=$mp3">
</object>

</div>
EOT;

  echo($prepared_div);
}
