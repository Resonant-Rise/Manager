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
$query = "SELECT id,name,mcf_link FROM `1102` where id=1192";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$link = $row['mcf_link'];
		$id = $row['id'];
        
        $file = file_get_contents($link);
        $json = json_decode($file, true);
        $authorfinal = '';


    foreach ($json['authors'] as $author)
    {
        if(!empty($authorfinal)) {
            $authorfinal .=';';
        }
        $authorfinal .= $author;
    }
        $update = isitempty($json['updated_at']);
        $project = isitempty($json['project_url']);
        $release = isitempty($json['release_type']);
        $license = isitempty($json['license']);
        $download = isitempty($json['download']['url']);
        
        $query = "INSERT INTO 1102 (release,author,repo,license,download_link) VALUES ($release,$authorfinal,$project,$license,$download)
        ON DUPLICATE KEY UPDATE
        release = VALUES(release),
        download_link = VALUES(download_link),
        repo = VALUES(repo),
        license = VALUES(license),
        author = VALUES(author)
        ";
        
        
        $sql = mysqli_real_escape_string($con, $query);

        mysqli_query($con, $sql) or die (mysqli_error($con));

    

    }
}