<?php
include('./db.php');

//Select data from existing data
$query = "SELECT mcname FROM `mc_names`";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    //Sets date and time to EST. Currently stored as UTC
    while($row = mysqli_fetch_assoc($result)) {
        $mcname = $row['mcname'];
        $url = 'https://api.mojang.com/users/profiles/minecraft/'.$mcname;
        // echo $url;
 // create curl resource
    // $ch = curl_init();

    // // set url
    // curl_setopt($ch, CURLOPT_URL, $url);

    // //return the transfer as a string
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $contents = file_get_contents($url);

    // $output contains the output string
  $json = json_decode($contents, true);

foreach($json as $item) {

        $id = $item['id'];
        $name = $item['name'];

        echo $id . ' - ' . $name;

// $query2 = "INSERT INTO `mc_names` (mcname,uuid) VALUES ('". $id ."','". $name ."')
// ON DUPLICATE KEY UPDATE
// mcname = VALUES(mcname),
// uuid = VALUES(uuid)
// ";

// mysqli_query($con, $query2) or die (mysqli_error($con));

}
}
}

// mysqli_close($con);
//     // close curl resource to free up system resources
//     curl_close($ch);
