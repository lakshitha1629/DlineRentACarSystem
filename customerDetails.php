<?php include 'common/header.php'; ?>

<?php include 'common/navigation.php'; ?>

<?php include 'common/topbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer Details Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            
                            <!-- <th>customerPhoto</th>
                            <th>customerNICPhoto</th>
                            <th>customerLicensePhoto</th>
                            
                            <th>customerSignature</th> -->

                <tbody>
                    <?php
                    require_once('connect.php');
                    $qry = "SELECT * FROM `customer_details` ORDER BY createDate DESC";

                    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>   
                            <tr>
                            <th>Customer Name</th>
                            <th>Driving LicenseNo</th>
                            <th>Address</th>
                            <th>Note</th>
                            <th>Create Date</th>
                            <th>Customer Photo</th>
                            <th>Customer NIC Front Photo</th>
                            <th>Customer NIC Back Photo</th>
                            <th>Customer License Photo</th>
                            <th>Customer Billing Proof Photo</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Customer Name</th>
                            <th>Driving LicenseNo</th>
                            <th>Address</th>
                            <th>Note</th>
                            <th>Create Date</th>
                            <th>Customer Photo</th>
                            <th>Customer NIC Front Photo</th>
                            <th>Customer NIC Back Photo</th>
                            <th>Customer License Photo</th>
                            <th>Customer Billing Proof Photo</th>
                            <th></th>
                            </tr>
                        </tfoot>';
                    if ($res = $con->query($qry)) {
                        while ($row = $res->fetch_assoc()) {
                            date_default_timezone_set('Asia/Colombo');
                            $currentDate = date('Y-m-d H:i:s');
                            $field0name = $row["customerName"];
                            $field1name = $row["drivingLicenseNo"];
                            $field2name = $row["address"];
                            $field3name = $row["Note"];
                            $field4name = $row["createDate"];
                            $field5name = $row["customerPhoto"];
                            $field6name = $row["customerNICPhoto"];
                            $field7name = $row["customerNICPhotoBack"];
                            $field8name = $row["customerLicensePhoto"];
                            $field9name = $row["customerBillPhoto"];
                            $timediff = strtotime($currentDate) - strtotime($field4name);

                            echo "<tr> 
                                    <td>" . $field0name  . "</td> 
                                    <td>" . $field1name . "</td> 
                                    <td>" . $field2name . "</td> 
                                    <td>" . $field3name . "</td> 
                                    <td>" . $field4name . "</td> 
                                    <td><img style='width: 100px;height: 100px;' src='" . $field5name . "' alt='image'/></td> 
                                    <td><img style='width: 100px;height: 100px;' src='" . $field6name . "' alt='image'/></td>";

                               if($field7name==NULL){
                                    echo "<td><img style='width: 100px;height: 100px;' src='./images/Not.png' alt='image'/></td>
                                    <td><img style='width: 100px;height: 100px;' src='" . $field8name . "' alt='image'/></td>";
                                }else{
                                    echo "
                                    <td><img style='width: 100px;height: 100px;' src='" . $field7name . "' alt='image'/></td>
                                    <td><img style='width: 100px;height: 100px;' src='" . $field8name . "' alt='image'/></td>";
                                    }

                                if($field9name==NULL){
                                    echo "<td><img style='width: 100px;height: 100px;' src='./images/Not.png' alt='image'/></td>";
                                }else{
                                    echo "<td><img style='width: 100px;height: 100px;' src='" . $field9name . "' alt='image'/></td>";
                                }

                                if ($timediff > 86400){ 
                                    echo "<td><a class='btn'><i class='fa fa-slack' style='font-size:20px;color:ash'></i></a> </td></tr>";
                                }else{
                                    echo "<td><a onClick=\"return confirm('Are you sure you want to delete?')\" href=\"delete_customer.php?id=" . $row['customerID'] . "\" class='btn'><i class='fa fa-window-close' style='font-size:20px;color:red'></i></a> </tr>";
                                }
                        } 

                        $res->free();
                    }
                    ?>
                </tbody>
                </table><br>
      <p style="margin-bottom: 2px;text-align: right;">Delete New Recode &nbsp;&nbsp;<i class='fa fa-window-close' style='font-size:18px;color:red'></i>
      &nbsp;&nbsp; Old Customer Recode &nbsp;&nbsp;<i class='fa fa-slack' style='font-size:20px;color:ash'></i></i>
    </p>


            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'common/footer.php'; ?>
