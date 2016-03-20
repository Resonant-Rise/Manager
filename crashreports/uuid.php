<?php
$txt='053eef64-67eb-41a5-bc96-8b615f26d56f-crash-2016-02-16_17.54.10-client.txt';

  $re1='([A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12})';	# SQL GUID 1
  $re2='(-)';	# Any Single Character 1
  $re3='((?:[a-z][a-z]+))';	# Word 1
  $re4='(-)';	# Any Single Character 2
  $re5='((?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3}))[-:\\/.](?:[0]?[1-9]|[1][012])[-:\\/.](?:(?:[0-2]?\\d{1})|(?:[3][01]{1})))(?![\\d])';	# YYYYMMDD 1
  $re6='(_)';	# Any Single Character 3
  $re7='(\\d)';	# Any Single Digit 1
  $re8='(\\d)';	# Any Single Digit 2
  $re9='(\\.)';	# Any Single Character 4
  $re10='(\\d)';	# Any Single Digit 3
  $re11='(\\d)';	# Any Single Digit 4
  $re12='(\\.)';	# Any Single Character 5
  $re13='(\\d)';	# Any Single Digit 5
  $re14='(\\d)';	# Any Single Digit 6
  $re15='(-)';	# Any Single Character 6
  $re16='((?:[a-z][a-z\\.\\d_]+)\\.(?:[a-z\\d]{3}))(?![\\w\\.])';	# File Name 1

  if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8.$re9.$re10.$re11.$re12.$re13.$re14.$re15.$re16."/is", $txt, $matches))
  {
      $guid1=$matches[1][0];
      $c1=$matches[2][0];
      $word1=$matches[3][0];
      $c2=$matches[4][0];
      $yyyymmdd1=$matches[5][0];
      $c3=$matches[6][0];
      $d1=$matches[7][0];
      $d2=$matches[8][0];
      $c4=$matches[9][0];
      $d3=$matches[10][0];
      $d4=$matches[11][0];
      $c5=$matches[12][0];
      $d5=$matches[13][0];
      $d6=$matches[14][0];
      $c6=$matches[15][0];
      $file1=$matches[16][0];
      print "$guid1$c1$word1$c2$yyyymmdd1$c3$d1$d2$c4$d3$d4$c5$d5$d6$c6$file1 \n";
  }