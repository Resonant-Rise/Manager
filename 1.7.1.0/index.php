<html>
<head>
	<style>
	body {
		background-color: black;
	}
	.rTable {
		display: table;
		width: 100%;
		color: white;
	}
	.rTableRow {
		display: table-row;
	}
	.rTableRow:nth-of-type(odd) {
		background: #01536D;
	}
	.rTableRow:nth-of-type(even) {
		background: #003650;
	}
	.rTableHeading {
		display: table-header-group;
		background-color: #ddd;
	}
	.rTableHead {
		font-weight: bold;
		text-decoration: underline;
	}
	.rTableCell, .rTableHead {
		display: table-cell;
		padding: 2px 5px;
		/*border: 1px solid #999999;*/
	}
	.rTableHeading {
		display: table-header-group;
		background-color: #ddd;
		font-weight: bold;
	}
	.rTableFoot {
		display: table-footer-group;
		font-weight: bold;
		background-color: #ddd;
	}
	.rTableBody {
		display: table-row-group;
	}
	a:link {
		color: red;
		text-decoration: none;
	}
	a:visited {
		color: #8E8E8E;
		text-decoration: none;
	}
	a:hover {
		color: #009FFF;
		text-decoration: none;
	}
	</style>
</head>
<body>
	<strong><pan style="color:red;">ALL TIMES ARE EST (Eastern/GMT -5)</span></strong>
<div class="rTable">
	<div class="rTableRow">
		<div class="rTableHead">
			Mod Updated
		</div>
		<div class="rTableHead">
			Last Added
		</div>
		<div class="rTableHead">
			Mod Name
		</div>
		<div class="rTableHead">
			Dependancies
		</div>
		<div class="rTableHead">
			Version
		</div>
		<div class="rTableHead">
			Author
		</div>
		<div class="rTableHead">
			Mod Page
		</div>
		<div class="rTableHead">
			Repo
		</div>
		<div class="rTableHead">
			License
		</div>
		<div class="rTableHead">
			&nbsp;
		</div>
		<div class="rTableHead">
			&nbsp;
		</div>
	</div>
<?php
include('../db.php');

$query = "SELECT * FROM mods7 ORDER BY update_time DESC";
$result = mysqli_query($con, $query);
function isitempty($val){
    if (trim($val) === ''){$val = "1420132909";}
    return $val;
}

if (mysqli_num_rows($result) > 0) {
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

		$link = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $row['link']);

		$repo = preg_replace("/htt.{1,2}:\/\/(.+?[\.\-])*(\w{1,61}\.[a-zA-Z]{2,})\/.*/i", "$2", $row['repo']);

    	if ($row['added']==0){

    	if(strtotime($update) > strtotime($last)) {
    	?>
    	<div class="rTableRow">
	<div class="rTableCell">
		<?php echo date("n/j/y   g:i A", $timestamp); ?>
	</div>
	<div class="rTableCell">
		<?php echo date("n/j/y  g:i A", $row['last_updated']); ?>
	</div>
	<div class="rTableCell">
		<?php echo $row['name']; ?>
	</div>
	<div class="rTableCell">
		<?php echo $row['dependancies']; ?>
	</div>
	<div class="rTableCell">
		<?php echo $row['version']; ?>
	</div>
	<div class="rTableCell">
		<?php echo $row['author']; ?>
	</div>
	<div class="rTableCell">
		<?php if ($row['link']=="NULL") {
			echo "N/A";
		} else {
			echo '<a href="' . $row['link'] . '">' . $link . '</a>';
		}?>
	</div>
	<div class="rTableCell">
		<?php if ($row['repo']=="NULL") {
			echo "N/A";
		} else {
			echo '<a href="' . $row['repo'] . '">' . $repo . '</a>';
		}?>
	</div>
	<div class="rTableCell">
		<?php if ($row['license']=="NULL") {
			echo "N/A";
		} else {
			echo $row['license'];
		} ?>
	</div>
	<div class="rTableCell">
		<?php echo "<a href='modupdated.php?modid=$id'>Mark Updated</a>"; ?>
	</div>
	<div class="rTableCell">
		<a href="nomod.php?modid=<?php echo $id; ?>" onclick="return confirm('Are you sure? \nThis will give Ryahn unwanted work to do. \nMake sure you are very sure!');">Mark Unwanted</a>
	</div>
</div>
       <?php
    }
  }
}
} else {
    echo "0 results";
}

mysqli_close($con);
?>
