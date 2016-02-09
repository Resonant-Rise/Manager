<?php


  $txt='http://www.curse.com/mc-mods/minecraft/236104-adobe-blocks-2';

  $re1='.*?';	# Non-greedy match on filler
  $re2='.';	# Uninteresting: c
  $re3='.*?';	# Non-greedy match on filler
  $re4='.';	# Uninteresting: c
  $re5='.*?';	# Non-greedy match on filler
  $re6='.';	# Uninteresting: c
  $re7='.*?';	# Non-greedy match on filler
  $re8='.';	# Uninteresting: c
  $re9='.*?';	# Non-greedy match on filler
  $re10='.';	# Uninteresting: c
  $re11='.*?';	# Non-greedy match on filler
  $re12='.';	# Uninteresting: c
  $re13='.*?';	# Non-greedy match on filler
  $re14='.';	# Uninteresting: c
  $re15='.*?';	# Non-greedy match on filler
  $re16='.';	# Uninteresting: c
  $re17='.*?';	# Non-greedy match on filler
  $re18='.';	# Uninteresting: c
  $re19='.*?';	# Non-greedy match on filler
  $re20='.';	# Uninteresting: c
  $re21='.*?';	# Non-greedy match on filler
  $re22='.';	# Uninteresting: c
  $re23='.*?';	# Non-greedy match on filler
  $re24='.';	# Uninteresting: c
  $re25='.*?';	# Non-greedy match on filler
  $re26='.';	# Uninteresting: c
  $re27='.*?';	# Non-greedy match on filler
  $re28='.';	# Uninteresting: c
  $re29='.*?';	# Non-greedy match on filler
  $re30='.';	# Uninteresting: c
  $re31='.*?';	# Non-greedy match on filler
  $re32='.';	# Uninteresting: c
  $re33='.*?';	# Non-greedy match on filler
  $re34='.';	# Uninteresting: c
  $re35='.*?';	# Non-greedy match on filler
  $re36='.';	# Uninteresting: c
  $re37='.*?';	# Non-greedy match on filler
  $re38='.';	# Uninteresting: c
  $re39='.*?';	# Non-greedy match on filler
  $re40='.';	# Uninteresting: c
  $re41='(.)';	# Any Single Character 1
  $re42='((?:[a-z][a-z]+))';	# Word 1
  $re43='(.)';	# Any Single Character 2
  $re44='((?:[a-z][a-z]+))';	# Word 2
  $re45='(.)';	# Any Single Character 3
  $re46='((?:[a-z][a-z]+))';	# Word 3
  $re47='(.)';	# Any Single Character 4

  if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8.$re9.$re10.$re11.$re12.$re13.$re14.$re15.$re16.$re17.$re18.$re19.$re20.$re21.$re22.$re23.$re24.$re25.$re26.$re27.$re28.$re29.$re30.$re31.$re32.$re33.$re34.$re35.$re36.$re37.$re38.$re39.$re40.$re41.$re42.$re43.$re44.$re45.$re46.$re47."/is", $txt, $matches))
  {
      $c1=$matches[1][0];
      $word1=$matches[2][0];
      $c2=$matches[3][0];
      $word2=$matches[4][0];
      $c3=$matches[5][0];
      $word3=$matches[6][0];
      $c4=$matches[7][0];
      print "($c1) ($word1) ($c2) ($word2) ($c3) ($word3) ($c4) \n";
  }
