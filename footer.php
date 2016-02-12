<?php function auto_copyright($year = 'auto'){
   if(intval($year) == 'auto'){ $year = date('Y'); }
    if(intval($year) == date('Y')){ echo intval($year); }
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
    if(intval($year) > date('Y')){ echo date('Y'); }
 } ?>

<footer>
    Resonant Rise Manager &copy; <?php echo auto_copyright('2015'); ?> <br />
    Resonant Rise Manager is property of Resonant Rise. <br />
    Resonant Rise is maintained by the Resonant Rise development team.
    Minecraft mod info pulled from <a href="https://bot.notenoughmods.com/">NotEnoughMods</a>. <div id="heart"></div> You guys
</footer>
</body>
</html>
