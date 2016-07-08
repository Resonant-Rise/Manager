<html>
<head>
<!--<META http-equiv="refresh" content="1;URL=/1.8.9/index.php">-->
</head>
</html>
<?php
include('../db.php');
function isitempty($val){
    if (trim($val) === ''){$val = "NULL";}
    return $val;
}
$query = "SELECT id,name,mcf_link FROM `1102`";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$link = $row['mcf_link'];
		$id = $row['id'];
		$modname = $row['name'];
        
        $file = file_get_contents($link);
        $json = json_decode($file, true);

foreach ($json as $json1)
{
    

        echo $json1["url"] . "<br />";
        echo $json1["authors"] . "<br />";
        echo $json1["updated_at"] . "<br />";
        echo $json1["project_url"] . "<br />";
        echo $json1["release_type"] . "<br />";
        echo $json1["license"] . "<br />";
        echo $json1["download"]["url"] . "<br />";
}
    

    }
}