<?php
include('../db.php');
include('../header.php');
if(is_logged_in()) {
    $user = userValue(null, "username");
?>
<div class="container">
        <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert"><div class="cross">x</div></button>
  <h4>ATTENTION!</h4>
  <p>All times presented here, are in Eastern Time (GMT -5)</p>
</div>
<table id="table" class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Mod Updated</th>
      <th>Last Updated</th>
      <th>Mod Name</th>
      <th>Dependancies</th>
      <th>Version</th>
      <th>Author</th>
      <th>Mod Page</th>
      <th>Repo</th>
      <th>License</th>
      <th>Download</th>
      <th>Update?</th>
      <th>Unwanted?</th>
    </tr>
  </thead>
    <tbody>
    <?php
//Select data from existing data
$query = "SELECT * FROM `1710` ORDER BY update_time DESC";
$result = mysqli_query($con, $query);
    //Checks to see if value is empty. This is for the date
function isitempty($val){
    if (trim($val) === ''){$val = "1420132909";}
    return $val;
}

    //With data from database. Display. This also checks to make sure its not empty
if (mysqli_num_rows($result) > 0) {
    //Sets date and time to EST. Currently stored as UTC
	date_default_timezone_set('America/New_York');
    while($row = mysqli_fetch_assoc($result)) {
    	$id = $row['id'];
    	$download = $row['download_link'];
    	$timestamp = $row['update_time'];
    	$authors1 = explode(',', $row['author']);

    	$date = new DateTime();
		$date->setTimestamp($row['last_updated']);
		$last = $date->format('M-d-Y H:i:s');
        $ldate = $date->format('n/j/y');
        $ltime = $date->format('n/j/y g:i A');

		$date1 = new DateTime();
		$date1->setTimestamp($row['update_time']);
		$update = $date1->format('M-d-Y H:i:s');
        $udate = $date1->format('n/j/y');
        $utime = $date1->format('n/j/y g:i A');

        //Parse link to get FQDN
		$link = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $row['link']);

        //Parse repo to get FQDN
		$repo = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $row['repo']);

        //If not marked as unwanted, display data
    	if ($row['added']==0){

        //If the mod update timestamp is more than when it was last updated
    	if(strtotime($last)=='1420132909') {
    	?>
    	<tr>
	<td>
		<?php echo $utime; ?>
	</td>
	<td>
		<?php echo $ltime; ?>
	</td>
	<td>
		<?php echo $row['name']; ?>
	</td>
	<td>
		<?php echo $row['dependancies']; ?>
	</td>
	<td>
		<?php echo $row['version']; ?>
	</td>
	<td>
		<?php 
		echo '<div class="author">Authors(' . sizeof($authors1) . ')';
		echo '<span class="authortip">';
		foreach($authors1 as $authors) {
			echo $authors . '<br />';
		}
		echo '</span></div>';?>
	</td>
	<td>
		<?php if ($row['link']=="NULL") {
			echo "N/A";
		} else {
			echo '<a href="' . $row['link'] . '" class="btn btn-primary btn-xs">' . $link . '</a>';
		}?>
	</td>
	<td>
		<?php if ($row['repo']=="NULL") {
			echo "N/A";
		} else {
			echo '<a href="' . $row['repo'] . '" class="btn btn-default btn-xs">' . $repo . '</a>';
		}?>
	</td>
	<td>
		<?php if ($row['license']=="NULL") {
			echo "N/A";
		} else {
			echo $row['license'];
		} ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { if(empty($download)) { echo "<a href='#' class='btn btn-info disabled'>Download</a>"; } else { echo "<a href='" . $download ."' class='btn btn-info'>Download</a>"; }} else { echo "<a href='#' class='btn btn-info disabled'>Download</a>"; } ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='modupdated.php?modid=" . $id . "&user=" . $user . "' class='btn btn-success' class='btn btn-danger' onclick='return confirm(\"Are you sure want to update?\")'>Submit</a>"; } else { echo "<a href='#' class='btn btn-success disabled'>Submit</a>"; } ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='nomod.php?modid=" . $id . "&user=" . $user . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to remove?\")'>BE GONE!</a>"; } else { echo "<a href='#' class='btn btn-danger disabled'>Submit</a>"; } ?>
	</td>
        </tr>
       <?php
    } elseif (strtotime($update) > strtotime($last) and strtotime($last)!='1420132909') { ?>
            <tr class="info">
	<td>
		<?php echo date("n/j/y   g:i A", $timestamp); ?>
	</td>
	<td class="lastupdated">
		<?php echo date("n/j/y  g:i A", $row['last_updated']); ?>
	</td>
	<td>
		<?php echo $row['name']; ?>
	</td>
	<td>
		<?php echo $row['dependancies']; ?>
	</td>
	<td>
		<?php echo $row['version']; ?>
	</td>
	<td>
		<?php
		echo '<div class="author">Authors(' . sizeof($authors1) . ')';
		echo '<span class="authortip">';
		foreach($authors1 as $authors) {
			echo $authors . '<br />';
		}
		echo '</span></div>';?>
	</td>
	<td>
		<?php if ($row['link']=="NULL") {
			echo "N/A";
		} else {
			echo '<a href="' . $row['link'] . '" class="btn btn-primary btn-xs">' . $link . '</a>';
		}?>
	</td>
	<td>
		<?php if ($row['repo']=="NULL") {
			echo "N/A";
		} else {
			echo '<a href="' . $row['repo'] . '" class="btn btn-default btn-xs">' . $repo . '</a>';
		}?>
	</td>
	<td>
		<?php if ($row['license']=="NULL") {
			echo "N/A";
		} else {
			echo $row['license'];
		} ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='" . $download ."' class='btn btn-info'>Download</a>"; } else { echo "<a href='#' class='btn btn-info disabled'>Download</a>"; } ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='modupdated.php?modid=" . $id . "&user=" . $user . "' class='btn btn-success'>Submit</a>"; } else { echo "<a href='#' class='btn btn-success disabled'>Submit</a>"; } ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='nomod.php?modid=" . $id . "&user=" . $user . "' class='btn btn-danger' onclick='return confirm(\"are you sure?\")'>BE GONE!</a>"; } else { "<a href='#' class='btn btn-danger disabled'>BE GONE!</a>"; } ?>
	</td>
        </tr>
        <?php
        }
  }
}
} else {
    echo "0 results";
}

mysqli_close($con);
} else { ?>
        <div class="alert alert-danger">
  <strong>Oh snap!</strong> Only logged in users can see this page. Please login!
</div>
    <?php
}
?>
  </tbody>
</table>
</div>
    <?php include('../footer.php'); ?>
