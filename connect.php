<?php
error_reporting(0);

$hostname = 'us-cdbr-east-04.cleardb.com';
$username = 'b20d65d4f653dc';
$password = '7a987524';
$dbname = 'heroku_360407db4f1262';

$con = new mysqli($hostname,$username,$password,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>