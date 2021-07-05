<?php
$servername = "us-cdbr-east-04.cleardb.com";
$username = 'b20d65d4f653dc';
$password = 'ad3e02fe241d510';

    $connect = new PDO("mysql:host=$servername;dbname=heroku_360407db4f12625", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>