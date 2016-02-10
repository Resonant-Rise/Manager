<?php
$parsed = 'https://widget.mcf.li/mc-mods/minecraft/227049-iron-backpacks.json';
$url = file_get_contents($parsed);
            $cursej = json_decode($content, true);
            echo $cursej['title'];
