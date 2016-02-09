<?php
// create curl resource
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "bot.notenoughmods.com/1.8.9.json");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
  $json = json_decode(curl_exec($ch), true);
function isitempty($val){
    if (trim($val) === ''){$val = "NULL";}
    return $val;
}

foreach($json as $item) {
 echo '<img src="' . $time['thumbnail'] . 'alt="' . $item['title'] . '"><br />';
 foreach($item['download'] as $dl) {
     echo $dl['url'];
     echo $dl['name'];
     echo $dl['version'];
 }
}
