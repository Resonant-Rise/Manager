<?php
include('../db.php');
//Select data from existing data
$query = "SELECT * FROM mods7 ORDER BY update_time DESC";
$result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
    //Sets date and time to EST. Currently stored as UTC
	date_default_timezone_set('America/New_York');
    while($row = mysqli_fetch_assoc($result)) {
        $link = $row['link'];

        //Process for FQDN
        $link = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $link);
        //If its curse.com, process normally
        if ($link == 'curse.com') {
            $newurl = explode("http://www.curse.com", $link);
            $parsed = 'https://widget.mcf.li' . $newurl[1] . '.json';
        }
        $ch1 = curl_init();

        // set url
        curl_setopt($ch1, CURLOPT_URL, $parsed);

        //return the transfer as a string
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // $output contains the output string
           $pjson = json_decode(curl_exec($ch1), true);
            echo $pjson['title'] . "<br />" . '<img src="' . $pjson['thumbnail'] . '" alt="' . $pjson['title'] . '"><br />' . $pjson['download']['url'] . "<br /><br />";
    //If its curseforge.com, process HTML
        if ($link == 'curseforge.com') {
        $html = @file_get_contents($item['longurl']);
        //Check if URL gives 404
        if (empty($html)){
            return;
        } else {
            preg_match('%<li class="view-on-curse">\s+<a href="http:\/\/curse\.com\/project\/(?P<id>.*)">\s+View on Curse\.com\s+<\/a>\s+<\/li>%', $html, $matches);
            echo 'https://widget.mcf.li/project/' . $matches['id'] . '.json <br />';
    }
    }
    }
