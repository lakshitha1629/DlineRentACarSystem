<?php
session_start();
require_once('PDO.php');

if (isset($_POST['hidden_id'])) {
  date_default_timezone_set('Asia/Colombo');
  $site_name = $_POST['site_name'];
  $pcn_config_status = $_POST['pcn_config_status'];
  $pcn_remark = $_POST['pcn_remark'];
  //$defined_by = $_SESSION['user_name'];
  $pcn_config_by = 'PCN';
  $pcn_config_date = date('Y-m-d H:i:s');
  $id = $_POST['hidden_id'];

  for ($count = 0; $count < count($id); $count++) {
     $data = array(
      ':site_name'   => $site_name[$count],
      ':pcn_config_status'   => $pcn_config_status[0],
      ':pcn_remark'  => $pcn_remark[0],
      ':pcn_config_by'   => $pcn_config_by,
      ':pcn_config_date'   => $pcn_config_date,
      ':id'   => $id[$count]
    );
    $query = "
  UPDATE sites 
  SET site_name = :site_name,pcn_config_status = :pcn_config_status, pcn_remark = :pcn_remark, pcn_config_by = :pcn_config_by, pcn_config_date = :pcn_config_date
  WHERE id = :id
  ";
  
    $statement = $connect->prepare($query);
    $statement->execute($data);
    header("Location: dashboard.php");
  }
}
