<?php 
  require_once ('connect.php');
  $output = "";

if(isset($_POST['export1'])){ 
  date_default_timezone_set('Asia/Colombo');
  $currentDate = date('Y-m-d H:i:s');
   $query = "SELECT * FROM customer_details";
   $result = mysqli_query($con, $query);
   if(mysqli_num_rows($result) > 0)
   {
    $output .= "
     <table class='table' bordered='1'>  
     <tr>
     <th>Customer Name</th>
     <th>Driving LicenseNo</th>
     <th>Address</th>
     <th>Note</th>
     <th>Create Date</th>
    </tr>
    ";
    while($row = mysqli_fetch_array($result))
    {
                  $output .= "<tr>
                  <td>".$row['customerName']."</td> 
                  <td>".$row['drivingLicenseNo']."</td> 
                  <td>".$row['address']."</td> 
                  <td>".$row['Note']."</td>
                  <td>".$row['createDate']."</td>
                   </tr>";
    }
    $output .= "</table>";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=Dline_Rent_Car_Report_"'.$currentDate.'"(full).xls');
    echo $output;
   }else{
     echo "Enter the correct date range";
   }
  }
  ?>