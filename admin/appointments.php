<?php
include("../config/db_connect.php");

$result = mysqli_query($conn, "SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Appointments</title>
<link rel="stylesheet" href="../css/style.css">

<style>
table{
    width:95%;
    margin:30px auto;
    border-collapse:collapse;
}

table,th,td{
    border:1px solid #ccc;
}

th{
    background:#0077b6;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    text-align:center;
}

h2{
    text-align:center;
    margin-top:20px;
    color:#0077b6;
}
</style>

</head>

<body>

<header>
<div class="logo">
<img src="../images/logo.png" height="50">    
Healthcare Multispeciality Hospital</div>

<nav>
<a href="dashboard.php">Dashboard</a>
<a href="../logout.php">Logout</a>
</nav>
</header>

<h2>Manage Appointments</h2>

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

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['doctor_name']; ?></td>
<td><?php echo $row['appointment_date']; ?></td>
<td><?php echo $row['appointment_time']; ?></td>
<td><?php echo $row['symptoms']; ?></td>

<td><?php echo $row['status']; ?></td>


</tr>

<?php } ?>
</table>

</body>
</html>