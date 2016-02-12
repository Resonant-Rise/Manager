<html>
<head>
    <script>
    $(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "http://mods.resonant-rise.com/1.7.10/index.php";
    }, 2000);
});
    </script>
</head>
</html>

<?php
include('../db.php');
include('../login/includes/api.php');

$user = userValue(null, "username");
$id = $_REQUEST['modid'];
$muser = $_REQUEST['user'];
echo $muser;
$query = "SELECT * FROM `1710` where id = '$id'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
	$query2 = "UPDATE `1710` SET last_updated=UNIX_TIMESTAMP(now()), modified_by='$user' WHERE id = '$id'";
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
