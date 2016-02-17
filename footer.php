<?php function auto_copyright($year = 'auto'){
   if(intval($year) == 'auto'){ $year = date('Y'); }
    if(intval($year) == date('Y')){ echo intval($year); }
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
    if(intval($year) > date('Y')){ echo date('Y'); }
 } ?>

<footer>
   <div class="author">Resonant Rise Manager &copy; <?php echo auto_copyright('2015'); ?> - Hover Over Me <br />
    <span class="authortip">Resonant Rise Manager is property of Resonant Rise. <br />
    Resonant Rise is maintained by the Resonant Rise development team.<br />
    Special thanks to: <a href="https://bot.notenoughmods.com/">NotEnoughMods</a> &amp; <a href="http://www.minecraftforum.net/members/citricsquid">citricsquid</a>. We <div id="heart"></div> you guys.
</span>
</div>
</footer>
</body>
</html>
