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
                    $qry = "SELECT * FROM `customer_details`";

                    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>   
                            <tr>
                            <th>Customer Name</th>
                            <th>Driving LicenseNo</th>
                            <th>Address</th>
                            <th>Note</th>
                            <th>Create Date</th>
                            <th>Customer Photo</th>
                            <th>Customer NIC Photo</th>
                            <th>Customer License Photo</th>
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
                            <th>Customer NIC Photo</th>
                            <th>Customer License Photo</th>
                            <th></th>
                            </tr>
                        </tfoot>';
                    if ($res = $con->query($qry)) {
                        while ($row = $res->fetch_assoc()) {
                            $field0name = $row["customerName"];
                            $field1name = $row["drivingLicenseNo"];
                            $field2name = $row["address"];
                            $field3name = $row["Note"];
                            $field4name = $row["createDate"];
                            $field5name = $row["customerPhoto"];
                            $field6name = $row["customerNICPhoto"];
                            $field7name = $row["customerLicensePhoto"];

                            echo "<tr> 
                                    <td>" . $field0name . "</td> 
                                    <td>" . $field1name . "</td> 
                                    <td>" . $field2name . "</td> 
                                    <td>" . $field3name . "</td> 
                                    <td>" . $field4name . "</td> 
                                    <td><img style='width: 100px;height: 100px;' src='" . $field5name . "' alt='image'/></td> 
                                    <td><img style='width: 100px;height: 100px;' src='" . $field6name . "' alt='image'/></td> 
                                    <td><img style='width: 100px;height: 100px;' src='" . $field7name . "' alt='image'/></td> 
                                    <td></td>
                                </tr>";
                        }

                        $res->free();
                    }
                    ?>
                </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'common/footer.php'; ?>
