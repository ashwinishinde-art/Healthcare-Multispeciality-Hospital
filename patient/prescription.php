<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location:../login.php");
    exit();
}

include("../config/db_connect.php");

$patient = $_SESSION['fullname'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Prescriptions</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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

<h2 class="text-center text-primary mb-4">My Prescriptions</h2>

<table class="table table-bordered table-hover shadow">

<tr class="table-primary">
    <th>Doctor</th>
    <th>Diagnosis</th>
    <th>Medicine</th>
</tr>

<?php

$result = mysqli_query($conn,
"SELECT * FROM prescriptions WHERE patient_name='$patient'");

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['doctor_name']; ?></td>
    <td><?php echo $row['diagnosis']; ?></td>
    <td><?php echo $row['medicine']; ?></td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>