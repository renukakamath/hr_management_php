<?php include 'connection.php' ?>



<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<a href="hrhome">Home</a>
	<a href="hr_manage_employee">Manage employee</a>
	<a href="hr_manage_attendance">manage attendance</a>
	<a href="hr_trainee_appraisal">create trainee appraisal</a>
	<a href="hr_send_promotion">send promotion</a>
	<a href="hr_send_notification">send notification</a>
	<a href="hr_view_queries">view queries</a>
	<a href="hr_view_feedback">view feedbacks</a>
	<a href="/">logout</a> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HR Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.10.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto" style="margin-right:  80px"><a href="#">HR Management</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="/static/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="hrhome.php">Home</a></li>
          <li><a class="nav-link scrollto" href="hr_manage_employee.php">Employee</a></li>
          <li><a class="nav-link scrollto" href="hr_manage_attendance.php">Attendance</a></li>

            <li><a class="nav-link scrollto" href="hr_prepare_salary.php">Salary</a></li>
           <li><a class="nav-link scrollto" href="hr_leaveapplication.php">Leave</a></li>
      <!--     <li><a class="nav-link scrollto" href="hr_manageevent.php"> Events</a></li> -->

           <li><a class="nav-link scrollto" href="hr_managevaccancy.php">vaccancy</a></li>
          <li><a class="nav-link scrollto" href="hr_appliciation.php">applications</a></li>
        
        <li><a class="nav-link scrollto" href="admin_send_notification.php">Notification</a></li>
          <li><a class="nav-link scrollto" href="hr_viewfeedback.php">Feedback</a></li>
        
          <li><a class="nav-link scrollto" href="login.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
