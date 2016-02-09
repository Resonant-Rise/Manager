<?php
$ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "bot.notenoughmods.com/1.8.9.json");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
  $json = json_decode(curl_exec($ch), true);

foreach($json as $item) {
    $link = $item['longurl'];
    $link = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $link);
    if ($link == 'curse.com') {
        $url = $item['longurl'];
        $newurl = explode("http://www.curse.com", $url);
        echo 'https://widget.mcf.li' . $newurl[1] . '.json <br />';
    } elseif ($link == 'curseforge.com') {
        $response = get_headers($item['longurl']);
        if($response[1] === 'HTTP/1.1 200 OK') {
            $html = file_get_contents($item['longurl']);
preg_match('%<li class="view-on-curse">\s+<a href="http:\/\/curse\.com\/project\/(?P<id>.*)">\s+View on Curse\.com\s+<\/a>\s+<\/li>%', $html, $matches);
echo 'https://widget.mcf.li/project/' . $matches['id'] . '.json <br />';
        }
    }
}
