<?php
include('./db.php');
$file = file_get_contents('master.json');
$json = json_decode($file, true);
function cursecheck($val, $val1) {
        if($val == 'curse') {
            return 'https://widget.mcf.li/mc-mods/minecraft/' . $val1 . '.json';
        } elseif($val == 'curseforge') {
            return 'https://widget.mcf.li/project/' . $val1 . '.json';
        }
    }


foreach($json as $item) {
    $query = "INSERT INTO `1102` (name,mcf_link,pack) VALUES 
    ('". mysqli_real_escape_string($con, $item['modname']) ."','". cursecheck($item['location'], $item['modid']) ."','". $item['pack'] ."')
    ON DUPLICATE KEY UPDATE
name = VALUES(name),
mcf_link = VALUES(mcf_link),
pack = VALUES(pack)";

mysqli_query($con, $query) or die (mysqli_error($con));
}