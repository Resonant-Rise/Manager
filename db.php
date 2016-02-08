<?php
$host = 'localhost';
$dbuser = 'residez3_rrmods';
$dbpass = 'GJfIr@#ZmVt;';
$db = 'residez3_rrmods';

$con = mysqli_connect($host,$dbuser,$dbpass,$db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
