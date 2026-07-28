<?php
session_start();
include("../config/db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        table{
            width:90%;
            margin:30px auto;
            border-collapse:collapse;
        }

        table,th,td{
            border:1px solid #ccc;
        }

        th{
            background:#0077b6;
            color:white;
            padding:12px;
        }

        td{
            padding:10px;
            text-align:center;
        }

        h2{
            text-align:center;
            margin-top:30px;
            color:#0077b6;
        }
        .btn-primary{
    font-size:22px;
    font-weight:bold;
    transition:0.3s;
}

.btn-primary:hover{
    transform:scale(1.08);
    box-shadow:0 10px 20px rgba(0,123,255,0.4);
}
    </style>

</head>

<body>
    <button class="btn btn-primary m-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#doctorMenu">
    <i class="fas fa-bars"></i>
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="doctorMenu">

    <div class="offcanvas-header bg-primary text-white">
        <h5 class="offcanvas-title">
            <i class="fas fa-user-md"></i> Doctor Panel
        </h5>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <a href="dashboard.php" class="btn btn-outline-primary w-100 mb-3">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="appointments.php" class="btn btn-outline-primary w-100 mb-3">
            <i class="fas fa-calendar-check"></i> Appointments
        </a>

        <a href="prescription.php" class="btn btn-outline-primary w-100 mb-3">
            <i class="fas fa-prescription"></i> Prescription
        </a>

        <a href="../logout.php" class="btn btn-danger w-100">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

    </div>

</div>

<header>

<div class="logo">
    <img src="../images/logo.png" height="50">
Healthcare Multispeciality Hospital
</div>

<nav>

<a href="../index.php">Home</a>
<a href="appointments.php">Appointments</a>
<a href="../logout.php">Logout</a>


</nav>

</header>

<h2>Doctor Dashboard</h2>

<table>

<tr>

<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Symptoms</th>
<th>Status</th>

</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM appointments");

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td><?php echo $row['appointment_time']; ?></td>

<td><?php echo $row['symptoms']; ?></td>
<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>
<br><br>

<div class="text-center my-5">

    <a href="prescription.php" class="btn btn-primary btn-lg px-5 py-3 shadow rounded-pill">
        <i class="fas fa-prescription"></i> Add Prescription
    </a>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>