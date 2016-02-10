<?php function auto_copyright($year = 'auto'){
   if(intval($year) == 'auto'){ $year = date('Y'); }
    if(intval($year) == date('Y')){ echo intval($year); }
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
    if(intval($year) > date('Y')){ echo date('Y'); }
 } ?>

<footer>
    Resonant Rise Manager &copy; <?php echo autho_copyright('2015'); ?>
Resonant Rise Manager is property of Resonant Rise. Resonant Rise is maintained by the Resonant Rise development team.
</footer>
</body>
</html>
