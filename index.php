<?php
include 'common.php';
print_header();
print_sidebar('Ĉiuj');

include 'podcasts.php';
print_begin_main();

define('IS_HOME_PAGE', True);
// the home page only considers podcasts which are still active
get_multi_podcast(array(array('http://www2.polskieradio.pl/podcast/39/podcast.xml', 'Pola Radio'),
			array('http://radioverda.squarespace.com/storage/audio/radioverda.xml', 'Radio Verda'),
			array('http://www.podkasto.net/feed/', 'Varsovia Vento'),
			array('http://parolumondo.com/?feed=podcast', 'Parolu Mondo'),
			array('http://melburno.org.au/3ZZZradio/feed/', '3ZZZ Radio'),
			array('http://www.ameriko.org/eo/rhc/feed', 'Radio Havana Kubo'),
			array('http://la-ondo.rpod.ru/rss.xml', 'Radio Esperanto'),
			array('http://radioaktiva.esperanto.org.uy/?feed=podcast', 'Radio Aktiva'),
			array('http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_1', 'Radio Vatikana'),
			array('http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_2', 'Radio Vatikana'),
			array('http://podkastoperposhtelefono.posterous.com/rss.xml', 'Podkasto Per Poŝtelefono'),
			array('http://media.radio-libertaire.org/php/emission.rss.php?emi=59', 'Radio ZAM'),
			array('http://www.panamaradio.org/podkastoj/rss.xml', 'Panama Radio')),
		  IS_HOME_PAGE);
print_end_main();
print_footer();

