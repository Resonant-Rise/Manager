<html>
<head>
<META http-equiv="refresh" content="1;URL=http://mods.resonant-rise.com/1.8.9/index.php">
</head>
</html>
<?php
include('../db.php');
include('../login/includes/api.php');
$user = userValue(null, "username");
$id = $_REQUEST['modid'];
$muser = $_REQUEST['user'];
echo $muser;
$query = "SELECT * FROM `189` where id = '$id'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
	$query2 = "UPDATE `189` SET added='1', modified_by='$user' WHERE id = '$id'";
	$result2 = mysqli_query($con, $query2) or die (mysqli_error($con));
	while($row = mysqli_fetch_assoc($result)) {
	echo $row['name'] . " marked as not included! <br />";
	echo "<a href='./index.php'>Back</a>";

}

} else {
	while($row = mysqli_fetch_assoc($result)) {
	echo $row['name'] . "could not be updated!";
}
}
mysqli_close($con);
?>
