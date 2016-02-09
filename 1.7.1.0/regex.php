<?php

 $txt='http://www.curse.com/mc-mods/minecraft/236104-adobe-blocks-2';

  $re1='.*?';	# Non-greedy match on filler
  $re2='\\/';	# Uninteresting: c
  $re3='.*?';	# Non-greedy match on filler
  $re4='\\/';	# Uninteresting: c
  $re5='.*?';	# Non-greedy match on filler
  $re6='(\\/)';	# Any Single Character 1
  $re7='((?:[a-z][a-z0-9_]*))';	# Variable Name 1
  $re8='(-)';	# Any Single Character 2
  $re9='((?:[a-z][a-z0-9_]*))';	# Variable Name 2
  $re10='(\\/)';	# Any Single Character 3
  $re11='((?:[a-z][a-z0-9_]*))';	# Variable Name 3
  $re12='(\\/)';	# Any Single Character 4

  if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8.$re9.$re10.$re11.$re12."/is", $txt, $matches))
  {
      $c1=$matches[1][0];
      $var1=$matches[2][0];
      $c2=$matches[3][0];
      $var2=$matches[4][0];
      $c3=$matches[5][0];
      $var3=$matches[6][0];
      $c4=$matches[7][0];
      print "($c1) ($var1) ($c2) ($var2) ($c3) ($var3) ($c4) \n";
  }
