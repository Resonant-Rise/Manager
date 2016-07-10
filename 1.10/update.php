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
$query = "SELECT id,name,mcf_link,update_time FROM `1102` where id=1192";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$link = $row['mcf_link'];
		$id = $row['id'];
        $modname = $row['name'];
        
        $file = file_get_contents($link);
        $json = json_decode($file, true);
        $authorfinal = '';
        $updatedat = $json['updated_at'];
        $current_updateat = $row['update_time'];

if($updatedat > $current_updateat) {
    foreach ($json['authors'] as $author)
    {
        if(!empty($authorfinal)) {
            $authorfinal .=';';
        }
        $authorfinal .= $author;
    }
        $updatedat1 = mysqli_real_escape_string($con, isitempty($updatedat));
        $project = mysqli_real_escape_string($con, isitempty($json['project_url']));
        $release = mysqli_real_escape_string($con, isitempty($json['release_type']));
        $license = mysqli_real_escape_string($con, isitempty($json['license']));
        $download = mysqli_real_escape_string($con, isitempty($json['download']['url']));
        
        $query = "INSERT INTO `1102` (name,version_type,author,repo,license,download_link,update_time) VALUES ('$modname','$release','$authorfinal','$project','$license','$download','$updatedat1'')
        ON DUPLICATE KEY UPDATE
        version_type = '$release',
        download_link = '$download',
        repo = '$project',
        license = '$license',
        author = '$authorfinal',
        update_time = '$updatedat1'
        ";
        
        
//        $sql = mysqli_real_escape_string($con, $query);
//        echo var_dump($query);

        mysqli_query($con, $query) or die (mysqli_error($con));

    
echo 'Done!';
    } else {
    echo "No updates found!";
}

    

}
}