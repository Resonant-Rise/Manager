<?php
include('../db.php');

$query = "SELECT id,name,link,added FROM `1710` order by id ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if ($row['added'] == '0') {
		$link = $row['link'];
		$id = $row['id'];
		$modname = $row['name'];
		$parse = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $row['link']);
		if ($parse == 'curse.com') {
		$curse = explode("http://www.curse.com/", $link);
		if (!empty($curse)) {
			$curselink = 'https://widget.mcf.li/' . $curse[1] . '.json';
		$query2 = "UPDATE `1710` set mcf_link='" . $curselink . "' WHERE id='$id'";
mysqli_query($con, $query2) or die(mysqli_error($con));
echo $id . ' - ' . $modname .',';
}
	}
	}
	}
}
