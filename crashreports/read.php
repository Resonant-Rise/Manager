<?php
foreach (glob('053eef64*.txt') as $filename) {
$file = file_get_contents($filename);

function GetBetween($content,$start,$end)
{
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        print '<pre>' . $r[0] . '</pre>';
    }
    print '';
}

echo '<pre>' . GetBetween($file, '---- Minecraft Crash Report ----', '-- Affected level --') . '</pre>';
}