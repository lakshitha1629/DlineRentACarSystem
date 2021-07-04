<?php
$servername = "localhost";
$username = 'root';
$password = '';

    $connect = new PDO("mysql:host=$servername;dbname=dlinerentcar_db", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>