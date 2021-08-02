<?php
require_once ('connect.php');

$id = $_GET['id']; // $id is now defined


mysqli_query($con,"DELETE FROM customer_details WHERE customerID='".$id."'");

  mysqli_close($con);
  header("Location: dashboard.php");
?> 