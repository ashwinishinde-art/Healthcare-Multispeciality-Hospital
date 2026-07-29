<?php
session_start();


if(!isset($_SESSION['user_id']))
{
    header("Location:../login.php");
    exit();
}

include("../config/db_connect.php");

$doctor = $_SESSION['fullname'];

$result = mysqli_query($conn,
"SELECT * FROM appointments
WHERE doctor_name='$doctor'
ORDER BY appointment_date");
?>
<!DOCTYPE html>
<html>
<head>

<title>Doctor Appointments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<header>

<div class="logo">
<img src="../images/logo.png" height="50">
Healthcare Multispeciality Hospital
</div>

<nav>

<a href="dashboard.php">Dashboard</a>

<a href="../logout.php">Logout</a>

</nav>

</header>

<div class="container mt-5">

<h2 class="text-center text-primary mb-4">
All Appointments
</h2>

<table class="table table-bordered table-striped">

<tr class="table-primary">

<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Symptoms</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

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
<td>

<?php
if($row['status']=="Pending")
{
?>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Accepted"
class="btn btn-success btn-sm">
Accept
</a>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected"
class="btn btn-danger btn-sm">
Reject
</a>

<?php
}
else
{
    echo "<span class='text-success fw-bold'>Updated</span>";
}
?>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>