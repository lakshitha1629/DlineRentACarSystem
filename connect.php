<?php
// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'dlinerentcar_db';

//heroku connect
$hostname = 'us-cdbr-east-04.cleardb.com';
$username = 'b20d65d4f653dc';
$password = 'ad3e02fe241d510';
$dbname = 'heroku_360407db4f12625';

$con = new mysqli($hostname, $username, $password, $dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



?>
