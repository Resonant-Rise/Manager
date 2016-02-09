<?php
// create curl resource
//    $ch = curl_init();
//
//    // set url
//    curl_setopt($ch, CURLOPT_URL, "https://widget.mcf.li/mc-mods/minecraft/229218-extracells2.json");
//
//    //return the transfer as a string
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
//
//    // $output contains the output string
//  $json = json_decode(curl_exec($ch), true);
$url = 'https://widget.mcf.li/mc-mods/minecraft/229218-extracells2.json';
$content = file_get_contents($url);
$json = json_decode($content, true);

function isitempty($val){
    if (trim($val) === ''){$val = "NULL";}
    return $val;
}

echo $json['title'];
echo '<br />';
echo '<img src="' . $json['thumbnail'] . '" alt="Smiley face" height="57" width="57"><br />';
echo $json['download']['url'];
echo '<br />';
echo $json['download']['version'];



$html = file_get_contents("http://minecraft.curseforge.com/projects/project-ores");
preg_match('%<li class="view-on-curse">\s+<a href="http:\/\/curse\.com\/project\/(?P<id>.*)">\s+View on Curse\.com\s+<\/a>\s+<\/li>%', $html, $matches);
echo 'https://widget.mcf.li/project/' . $matches['id'] . '.json';