<?php
include('../db.php');

$query = "SELECT id,name,link,added FROM `189` order by id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if ($row['added'] == '0') {
		$link = $row['link'];
		$id = $row['id'];
		$modname = $row['name'];
		$parse = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $link);
		if ($parse == 'curseforge.com') {
			$html = file_get_contents($link);
			preg_match('%<li class="view-on-curse">\s+<a href="http:\/\/curse\.com\/project\/(?P<id>.*)">\s+View on Curse\.com\s+<\/a>\s+<\/li>%', $html, $matches);
			$forge = 'https://widget.mcf.li/project/' . $matches['id'] . '.json';
			$query2 = "UPDATE `189` SET mcf_link='$forge' WHERE id=$id";
			mysqli_query($con, $query2) or die (mysqli_error($con));
			echo $id . ' - ' . $modname .',';
}
	}
	}
}
mysqli_close($con);