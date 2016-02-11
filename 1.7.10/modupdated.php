<?php
include('../db.php');

$id = $_REQUEST['modid'];

$query = "SELECT * FROM 1710 where id = '$id'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
	$query2 = "UPDATE 1710 SET last_updated=UNIX_TIMESTAMP(now()) WHERE id = '$id'";
	$result2 = mysqli_query($con, $query2) or die (mysqli_error($con));
	while($row = mysqli_fetch_assoc($result)) {
	echo $row['name'] . " updated! <br />";
	echo "<a href='./index.php'>Back</a>";

	exit;

}

} else {
	while($row = mysqli_fetch_assoc($result)) {
	echo $row['name'] . "could not be updated!";
}

}

mysqli_close($con);

	exit;
?>
