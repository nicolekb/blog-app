<?php 

//to make text clickable, anywhere in the app
function makeClickableLinks($text)
 {
	$text = " " . $text; // fixes problem of not linking if no chars before the link
	 $text = preg_replace('/(((f|ht){1}tp?s:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
						   '<a href="\\1">\\1</a>', $text);
	 $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
						   '\\1<a href="http://\\2">\\2</a>', $text);
	 $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
						   '<a href="mailto:\\1">\\1</a>', $text);
	 return trim($text);
 } // end makeClickableLinks

//Replace txt emoticon with an actual emoticon
 function addEmoticons($txt) {
 	// :) smile
 	$thisEmoticon = "<img src =\"emoticons/icon_smile.gif\">";
 	$txt = str_replace(":)", $thisEmoticon, $txt);

 	// :? confused
 	$thisEmoticon = "<img src =\"emoticons/icon_confused.gif\">";
 	$txt = str_replace("?)", $thisEmoticon, $txt);

 	// -> arrow
 	$thisEmoticon = "<img src =\"emoticons/icon_arrow.gif\">";
 	$txt = str_replace("->", $thisEmoticon, $txt);

 	// :( sad
 	$thisEmoticon = "<img src =\"emoticons/icon_sad.gif\">";
 	$txt = str_replace(":(", $thisEmoticon, $txt);

 	// ;) wink
 	$thisEmoticon = "<img src =\"emoticons/icon_wink.gif\">";
 	$txt = str_replace(";)", $thisEmoticon, $txt);

 	// >:( mad
 	$thisEmoticon = "<img src =\"emoticons/icon_mad.gif\">";
 	$txt = str_replace(">:|", $thisEmoticon, $txt);

 	// XD lol
 	$thisEmoticon = "<img src =\"emoticons/icon_lol.gif\">";
 	$txt = str_replace("XD", $thisEmoticon, $txt);

 	// BD cool
 	$thisEmoticon = "<img src =\"emoticons/icon_cool.gif\">";
 	$txt = str_replace("BD", $thisEmoticon, $txt);

 	// :O surprised
 	$thisEmoticon = "<img src =\"emoticons/icon_surprised.gif\">";
 	$txt = str_replace(":O", $thisEmoticon, $txt);


 	return $txt;
 }

?>