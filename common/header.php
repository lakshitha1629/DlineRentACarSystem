<?php
error_reporting(0);

include('functions.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dline Rent A Car & Tours</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="https://kit.fontawesome.com/f55ff8b89d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

  <!-- loader Js-->
  <script>
    $(window).load(function() {
      $(".se-pre-con").fadeOut("slow");;
    });
  </script>

 <!-- loader CSS-->
  <style>
    .no-js #loader {
      display: none;
    }

    .js #loader {
      display: block;
      position: absolute;
      left: 100px;
      top: 0;
    }

    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(images/loader.gif) center no-repeat #fff;
    }
  </style>

</head>

<body id="page-top">
  <div class="se-pre-con"></div>