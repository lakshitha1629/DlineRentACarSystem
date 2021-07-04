<?php 
  require_once ('connect.php');
  //$query = "SELECT * FROM cbm_cell_block WHERE `date` BETWEEN '$date1' AND '$date2'";
  //SELECT * FROM sites WHERE (`date` BETWEEN '2000-01-01' AND '2020-01-01') AND on_air='Pending..'
 // $date = date('Y-m-d');
  //$date1=$_POST['date1'];
  //$date2=$_POST['date2'];
  $output = "";

if(isset($_POST['export'])){ 
    date_default_timezone_set('Asia/Colombo');
    $currentDate = date('Y-m-d H:i:s');
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
   $query = "SELECT * FROM customer_details WHERE (`createDate` BETWEEN '$date1' AND '$date2')";
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
    header('Content-Disposition: attachment; filename=Dline_Rent_Car_Report_"'.$currentDate.'".xls');
    echo $output;
   }else{
     echo "Enter the correct date range";
   }
  }
  ?>