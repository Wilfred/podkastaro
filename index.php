<?php
include 'common.php';
print_header();
print_sidebar('Ĉiuj');

include 'podcasts.php';
print_begin_main();
get_multi_podcast(array('http://www.polskieradio.pl/podcast/39/podcast.xml',
			'http://radioverda.squarespace.com/storage/audio/radioverda.xml',
			'http://www.podkasto.net/feed/',
			'http://parolumondo.com/?feed=podcast',
			'http://melburno.org.au/3ZZZradio/feed/',
			'http://www.ameriko.org/eo/rhc/feed',
			'http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_1',
			'http://media01.vatiradio.va/podmaker/podcaster.aspx?c=esperanto_2'));
print_end_main();
print_footer();

