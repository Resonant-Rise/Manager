<?php
	$dir = "crashreports"; // crash reports dir name, be sure it exists already
	
	if (!isset($_POST['Version']) || !isset($_POST['UUID']) || !isset($_FILES['CrashLog'])) {
		die("e1");
	}
	
	// log
	file_put_contents($dir.'/lastlog.txt', var_export($_REQUEST, true)."\n".var_export($_FILES, true));
	
	$filename = $_POST['UUID'].'-'.basename($_FILES['CrashLog']['name']);
	if(!preg_match('/^[a-z0-9-_.]+\.txt$/', $filename)) { // check file name
		die("e2");
	}
	
	move_uploaded_file($_FILES['CrashLog']['tmp_name'], $dir.'/'.$filename);
?>