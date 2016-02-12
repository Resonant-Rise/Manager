<?php
include('./db.php');
include('./header.php');
if(is_logged_in()) {
?>
<div class="container">
<?php
    date_default_timezone_set('America/New_York');
    $date = new DateTime();
    $date->setTimestamp('1420132909');
    $date1 = $date->format('M-d-Y');
    $time = $date->format('H:i:s');

    echo $date1 . ' - ' . $time;



    ?>

</div>

<?php
}
include('../footer.php');
