<?php
// create curl resource
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "https://widget.mcf.li/mc-mods/minecraft/229218-extracells2.json");

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
 echo $time['thumbnail'];
 foreach($item['download'] as $dl) {
     echo $dl['url'];
     echo $dl['name'];
     echo $dl['version'];
 }
}
