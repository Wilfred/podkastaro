<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>Podkastaro: Esperantaj Podkastoj Por La Mondo</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11973220-2']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<style type="text/css">
#chio {
position: relative;
margin-left: auto;
margin-right: auto;
width: 41em;
}
#maldekstre {
position: absolute;
left: 0;
width: 9em;
}
#dekstre {
position: absolute;
right: 0;
width: 30em;
}
#titolo {
}
#titolo h1 {
text-align: right;
font-family: Serif;
font-size: 400%;
font-family: "Hoefler Text", serif;
font-style: italic;
margin: 0;
}
#titolo h2 {
text-align: right;
font-family: Serif;
font-size: 150%;
font-family: "Hoefler Text", serif;
font-style: italic;
color: gray;
margin: 0;
}


#maldekstre ul {
list-style-type: none;
text-align: right;
padding-left: 0;
}
#maldekstre li {
padding-bottom: 0.5em;
}
</style>


</head>

<body>

<div id="chio">
<div id="titolo">
<h1>podkastaro</h1>
<h2>esperantaj podkastoj por la mondo</h2>
</div>

<div id="maldekstre">
<ul>
<li><strong>Ĉiuj</strong>
<li>Radio Verda
<li>Pola Radio
<li>Varsovia Vento
<li>Parolu Mondo
<li>3ZZZ Radio
<li>Radio Havana Kubo
<li>esPodkasto
<li>Radio Esperanto
</ul>
</div>

<div id="dekstre">

<?php 
   include 'podkastoj.php';
   venigi_podkaston('http://radioverda.squarespace.com/storage/audio/radioverda.xml');
   // venigi_podkaston('http://www.polskieradio.pl/podcast/39/podcast.xml');
?>

</div>
</div>

</body>

</html>
