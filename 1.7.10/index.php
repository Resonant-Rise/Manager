<?php
include('../db.php');
include('../header.php');
if(is_logged_in()) {
?>
<div class="table-content">
        <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert"><div class="cross">x</div></button>
  <h4>ATTENTION!</h4>
  <p>All times presented here, are in Eastern Time (GMT -5)</p>
</div>
<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
      </form>

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
    	$timestamp = $row['update_time'];

    	$date = new DateTime();
		$date->setTimestamp($row['last_updated']);
		$last = $date->format('M-d-Y H:i:s');

		$date1 = new DateTime();
		$date1->setTimestamp($row['update_time']);
		$update = $date1->format('M-d-Y H:i:s');

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
		<?php echo $row['author']; ?>
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
		<?php if(is_minLevel(2)) { echo "<a href='modupdated.php?modid=$id' class='btn btn-success'>Submit</a>"; } else { echo "--"; } ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='nomod.php?modid=$id' class='btn btn-danger'>BE GONE!</a>"; } else { echo "--"; } ?>
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
		<?php echo $row['author']; ?>
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
		<?php if(is_minLevel(2)) { echo "<a href='modupdated7.php?modid=$id' class='btn btn-success'>Submit</a>"; } else { echo "--"; } ?>
	</td>
	<td>
		<?php if(is_minLevel(2)) { echo "<a href='nomod7.php?modid=$id' class='btn btn-danger'>BE GONE!</a>"; } else { echo "--"; } ?>
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
} else {
    echo "Only logged in users can see this";
}
?>
  </tbody>
</table>
</div>
    <?php include('../footer.php');

