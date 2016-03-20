<?php
include('../db.php');

$query = "SELECT id,name,mcf_link FROM `1710` order by id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$link = $row['mcf_link'];
		$id = $row['id'];
		$modname = $row['name'];
		if (!empty($link)) {
			$ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $link);

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
  $json = json_decode(curl_exec($ch), true);

  $download = $json['download']['url'];
			$query2 = "UPDATE `1710` SET download_link='$download' WHERE id=$id";
			mysqli_query($con, $query2) or die (mysqli_error($con));
			echo $id . ' - ' . $modname .',';
}
}
}