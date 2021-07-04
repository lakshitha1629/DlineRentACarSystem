<?php include 'common/header.php'; ?>

<?php include 'common/navigation.php'; ?>

<?php include 'common/topbar.php'; ?>

<?php include 'common/top.php'; ?>


<!-- form --->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">New Customer Form</h6>
  </div>
  <div class="card-body">
    <form method="post" action="">
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label>Customer Name :</label>
          <input type="text" name="CustomerName" class="form-control" placeholder="Enter Customer Name" maxlength="50" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Driving License No :</label>
          <input type="text" name="DrivingLicenseNo" id="DrivingLicenseNo" class="form-control" placeholder="Enter Driving License No" maxlength="20" style="text-transform: uppercase;" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label>Address :</label>
          <input type="text" name="Address" id="Address" class="form-control" placeholder="Enter Address" maxlength="50" required>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 mb-3">
        <label>Customer Photo :</label>
          <div id="my_camera"></div>
          <br/>
          <input class="btn btn-info" type="button" value="Take Customer Photo" onClick="take_snapshot_customer()">
          <input type="hidden" name="image_customer" class="image-tag-customer">
        </div>
        <div class="col-md-6 mb-3">
        <label>Customer Photo Preview:</label>
          <div id="results-customer">Your captured image will appear here...</div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 mb-3">
        <label>Customer NIC Photo :</label>
          <div id="my_camera"></div>
          <br/>
          <input class="btn btn-info" type="button" value="Take Customer NIC Photo" onClick="take_snapshot_customer_nic()">
          <input type="hidden" name="image_nic" class="image-tag-nic">
        </div>
        <div class="col-md-6 mb-3">
        <label>Customer NIC Photo Preview:</label>
          <div id="results-nic">Your captured image will appear here...</div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 mb-3">
        <label>Customer License Photo :</label>
          <div id="my_camera"></div>
          <br/>
          <input class="btn btn-info" type="button" value="Take Customer License Photo" onClick="take_snapshot_customer_license()">
          <input type="hidden" name="image_license" class="image-tag-license">
        </div>
        <div class="col-md-6 mb-3">
        <label>Customer License Photo Preview:</label>
          <div id="results-license">Your captured image will appear here...</div>
        </div>
      </div>


      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label>Note :</label>
          <input type="text" name="Note" id="Note" class="form-control" placeholder="Enter Note">
        </div>
      </div>
      <input class="btn btn-success" type=submit value="ADD" name="submit1">

    </form>
    <?php

    if (isset($_POST['submit1'])) {
      require_once('connect.php');
      date_default_timezone_set('Asia/Colombo');
      $createDate = date('Y-m-d H:i:s');

      $CustomerName = $_POST['CustomerName'];
      $DrivingLicenseNo = strtoupper($_POST['DrivingLicenseNo']);
      $Address = $_POST['Address'];
      // $customerPhoto = "test";
      // $customerNICPhoto = "test";
      // $customerLicensePhoto = "test";
      $customerSignature = "test";
      $Note = $_POST['Note'];
  
      // Customer Photo
      $target_file_customer = basename($_POST['image_customer']);
      $imageFileType_customer = strtolower(pathinfo($target_file_customer, PATHINFO_EXTENSION));
      $extensions_arr = array("jpg", "jpeg", "png");
      $image_base64_customer = base64_encode(file_get_contents($_POST['image_customer']));
      $customerPhoto = 'data:image/' . $imageFileType_customer . ';base64,' . $image_base64_customer;

      // Customer NIC Photo
      $target_file_customer_nic = basename($_POST['image_nic']);
      $imageFileType_nic = strtolower(pathinfo($target_file_customer_nic, PATHINFO_EXTENSION));
      $extensions_arr = array("jpg", "jpeg", "png");
      $image_base64_customer_nic = base64_encode(file_get_contents($_POST['image_nic']));
      $customerNICPhoto = 'data:image/' . $imageFileType_nic . ';base64,' . $image_base64_customer_nic;

       // Customer license Photo
      $target_file_customer_license = basename($_POST['image_license']);
      $imageFileType_license = strtolower(pathinfo($target_file_customer_license, PATHINFO_EXTENSION));
      $extensions_arr = array("jpg", "jpeg", "png");
      $image_base64_customer_license = base64_encode(file_get_contents($_POST['image_license']));
      $customerLicensePhoto = 'data:image/' . $imageFileType_license . ';base64,' . $image_base64_customer_license;

      $qry1 = "INSERT INTO `customer_details`(`customerName`, `drivingLicenseNo`, `address`, `customerPhoto`, `customerNICPhoto`, `customerLicensePhoto`, `customerSignature`, `Note`, `createDate`) VALUES ('$CustomerName','$DrivingLicenseNo','$Address','$customerPhoto','$customerNICPhoto','$customerLicensePhoto','$customerSignature','$Note','$createDate')";
      
      if (!mysqli_query($con, $qry1)) {
        die('Error: ' . mysqli_error());
      } else {
        echo "
        <script>
            $.confirm({
              title: 'Successfully!',
              content: 'Your record added Successfully..',
              type: 'green',
              typeAnimated: true,
              buttons: {
                  close: function () {
                  }
              }
          });
        </script>";
      }
    }
    ?>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'common/footer.php'; ?>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot_customer() {
        Webcam.snap( function(data_uri) {
            $(".image-tag-customer").val(data_uri);
            document.getElementById('results-customer').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }

    function take_snapshot_customer_nic() {
        Webcam.snap( function(data_uri) {
            $(".image-tag-nic").val(data_uri);
            document.getElementById('results-nic').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    function take_snapshot_customer_license() {
        Webcam.snap( function(data_uri) {
            $(".image-tag-license").val(data_uri);
            document.getElementById('results-license').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    
    
</script>