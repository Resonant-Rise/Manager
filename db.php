<?php
$host = 'localhost';
$dbuser = 'root';
$dbpass = ';';
$db = 'mods';

$con = mysqli_connect($host,$dbuser,$dbpass,$db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
