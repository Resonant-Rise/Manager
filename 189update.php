<?php
include('db.php');
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

		$name = isitempty($item['name']);
		$version = isitempty($item['version']);
		$author = isitempty($item['author']);
		$link = isitempty($item['longurl']);
		$comment = isitempty($item['comment']);
		$repo = isitempty($item['repo']);
		$license = isitempty($item['license']);
		$time = isitempty($item['lastupdated']);
		foreach($item['dependencies'] as $dep) {
            $dep2 = isitempty($dep);

$query = "INSERT INTO 189 (name,dependancies,version,author,link,repo,license,update_time) VALUES ('". $name."','". $dep2 ."','". $version."','". $author."','". $link."','". $repo ."','". $license ."','". $time."')
ON DUPLICATE KEY UPDATE
version = VALUES(version),
link = VALUES(link),
repo = VALUES(repo),
license = VALUES(license),
update_time = VALUES(update_time),
added = VALUES(added)
";

$q = mysqli_query($con, $query) or die (mysqli_error($con));

}
}


mysqli_close($con);
    // close curl resource to free up system resources
    curl_close($ch);

