<?php
include('../login/includes/api.php');
include('../db.php');
if(is_logged_in()) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Resonant Rise Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script type="text/javascript" src="https://bootswatch.com/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/slate.css"/>
<!--
        <script>
      function load_home(){
document.getElementById("indivload").innerHTML='<object type="text/html" data="1.8.9/index.php" ></object>';
}
</script>
-->
    </head>
    <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">RRM<br /><h5><small id="brand-small">Resonant Rise Manager</small></h5></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<!--        <li class="active"><a href="#" onclick="load_home()">1.7.10 <span class="sr-only">(current)</span></a></li>-->
        <li class="active"><a href="../1.7.1.0/index.php">1.7.10 <span class="sr-only">(current)</span></a></li>
        <li><a href="../1.8.9/index.php">1.8.9</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>
<table class="table table-striped table-hover ">
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
$query = "SELECT * FROM mods7 ORDER BY update_time DESC";
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
    	if(strtotime($update) > strtotime($last)) {
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
    </body>

