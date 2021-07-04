<?php include 'common/header.php'; ?>

<?php include 'common/navigation.php'; ?>

<?php include 'common/topbar.php'; ?>



<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Excel Exporter</h1>
  </div>
  <!-- Content Row -->
  <div class="row">



    <!-- export  -->
    <div class="col-xl-12 col-md-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Date Range Excel Exporter</h6>
        </div>
        <div class="card-body">
          <form method="post" action="export.php">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" style="margin-right: -94px;">Date Range :</label>
              <div class="col-sm-3">
                <input class="form-control" type="date" name="date1" maxlength="10" required>
              </div>
              <label class="col-sm-0 col-form-label"> to </label>
              <div class="col-sm-3">
                <input class="form-control" type="date" name="date2" maxlength="10" required>
              </div>
              <div class="col-sm-2">
                <input class="btn btn-success" type=submit value="Export" name="export">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- export all -->
    <div class="col-xl-12 col-md-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Full Sites Table Excel Exporter</h6>
        </div>
        <div class="card-body">
          <form method="post" action="export_all.php">
            <div class="form-row">
              <div class="col-md-8 mb-3">
                <label>Export Full File : </label>
                <input class="btn btn-success" type="submit" name="export1" value="Export">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'common/footer.php'; ?>