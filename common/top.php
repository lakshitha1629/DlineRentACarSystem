 <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">
  <div class="col-xl-12 col-sm-12 mb-3">
    <div class="card text-white o-hidden h-100" style="background-image: url('images/bg-4.jpg');background-size: cover;padding-bottom: 100px;">
      <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-fw fa-users"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<!-- Content Row -->
<div class="row">

  <!-- 1 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Date</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                date_default_timezone_set('Asia/Colombo');
                                                                $time = date('Y-m-d');
                                                                echo $time;
                                                                ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2 -->

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Register Customer Count</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                require_once('connect.php');
                                                                $qry = "SELECT COUNT(`customerID`) as a FROM `customer_details`";

                                                                $res = $con->query($qry);
                                                                while ($data1 = $res->fetch_assoc()) {
                                                                  echo $data1['a'];
                                                                }
                                                                ?></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Available Vehicle Count</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                // require_once('connect.php');
                                                                // $date3 = date('Y-m-d');
                                                                // $qry = "SELECT COUNT(`status`) as c FROM `parking_slots` WHERE `status`='Inactive'";

                                                                // $res = $con->query($qry);
                                                                // while ($data1 = $res->fetch_assoc()) {
                                                                //   echo $data1['c'];
                                                                // }
                                                                ?></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-car fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- 4 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <a href="Payment_Management.php" style="text-decoration:none">
      <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Income</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                  // require_once('connect.php');
                                                                  // $date3 = date('Y-m-d');
                                                                  // $qry = "SELECT SUM(`price`) as d FROM `smart_wallet` WHERE `price` <= 0 GROUP BY `date`=MONTH(NOW())";

                                                                  // $res = $con->query($qry);
                                                                  // while ($data1 = $res->fetch_assoc()) {
                                                                  //   echo 'Rs. ' . (abs($data1['d']));
                                                                  // }
                                                                  ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calculator fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
  </div>
  </a>
</div>