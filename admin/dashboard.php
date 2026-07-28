<?php
session_start();
include("../config/db_connect.php");

$totalPatients = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE role='patient'"));
$totalDoctors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE role='doctor'"));
$totalAppointments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appointments"));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="../css/style.css">

<style>

body{
    background:#f4f8fb;
}

/* Sidebar */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100%;
    background:#0d6efd;
    padding-top:20px;
    color:white;
}

.sidebar h3{
    text-align:center;
    margin-bottom:30px;
    font-weight:bold;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    font-size:18px;
}

.sidebar a:hover{
    background:#084298;
}

/* Main */

.main{
    margin-left:260px;
    padding:30px;
}

.card-box{
    background:#0077b6;
    color:white;
    border-radius:15px;
    padding:30px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
    transition:.3s;
}

.card-box:hover{
    transform:translateY(-5px);
}

.card-box h1{
    font-size:55px;
}

.quick-btn{
    width:100%;
    margin-top:12px;
    font-size:18px;
    font-weight:bold;
}

.info-card{
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.15);
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h3>
<i class="fas fa-user-shield"></i><br>
Admin Panel
</h3>

<a href="dashboard.php">
<i class="fas fa-home"></i> Dashboard
</a>

<a href="doctors.php">
<i class="fas fa-user-md"></i> Doctors
</a>

<a href="patients.php">
<i class="fas fa-users"></i> Patients
</a>

<a href="appointments.php">
<i class="fas fa-calendar-check"></i> Appointments
</a>

<a href="departments.php">
<i class="fas fa-hospital"></i> Departments
</a>

<a href="reports.php">
<i class="fas fa-chart-line"></i> Reports
</a>

<a href="../logout.php">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</div>

<!-- Main -->

<div class="main">

<h2 class="text-primary mb-4">
<i class="fas fa-user-shield"></i>
Admin Dashboard
</h2>

<div class="row">

<div class="col-md-4">

<div class="card-box">

<h1><?php echo $totalPatients; ?></h1>

<h4>Total Patients</h4>

</div>

</div>

<div class="col-md-4">

<div class="card-box">

<h1><?php echo $totalDoctors; ?></h1>

<h4>Total Doctors</h4>

</div>

</div>

<div class="col-md-4">

<div class="card-box">

<h1><?php echo $totalAppointments; ?></h1>

<h4>Total Appointments</h4>

</div>

</div>

</div>

<div class="row mt-5">

<div class="col-md-6">

<div class="info-card">

<h3 class="text-primary">Quick Actions</h3>

<a href="doctors.php" class="btn btn-primary quick-btn">
Manage Doctors
</a>

<a href="patients.php" class="btn btn-success quick-btn">
Manage Patients
</a>

<a href="appointments.php" class="btn btn-warning quick-btn">
Manage Appointments
</a>

<a href="departments.php" class="btn btn-info quick-btn">
Departments
</a>

<a href="reports.php" class="btn btn-dark quick-btn">
Reports
</a>

</div>

</div>

<div class="col-md-6">

<div class="info-card">

<h3 class="text-primary">Hospital Information</h3>

<p>🏥 Healthcare Multispeciality Hospital</p>

<p>📞 +91 9876543210</p>

<p>📧 healthcare@gmail.com</p>

<p>🕒 24 × 7 Emergency Services</p>

</div>

</div>

</div>

</div>

</body>
</html>