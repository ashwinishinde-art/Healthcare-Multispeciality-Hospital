<?php
include("../config/db_connect.php");

$patients = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$doctors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM doctors"));
$appointments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appointments"));
$payments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM payments"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Reports</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header>
<div class="logo">Healthcare Multispeciality Hospital</div>

<nav>
<a href="dashboard.php">Dashboard</a>
<a href="../logout.php">Logout</a>
</nav>

</header>

<div class="container">

<h2>Hospital Reports</h2>

<h3>Total Patients : <?php echo $patients; ?></h3>

<h3>Total Doctors : <?php echo $doctors; ?></h3>

<h3>Total Appointments : <?php echo $appointments; ?></h3>

<h3>Total Payments : <?php echo $payments; ?></h3>

</div>

</body>
</html>