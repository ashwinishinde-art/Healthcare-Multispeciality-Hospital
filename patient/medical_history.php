<?php
session_start();
include("../config/db_connect.php");

$patient = $_SESSION['fullname'];

$result = mysqli_query($conn,
"SELECT * FROM prescriptions WHERE patient_name='$patient'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Medical History</title>
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
padding:10px;
text-align:center;
}

th{
background:#0077b6;
color:white;
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
<img src="images/logo.png" height="50">    
Healthcare Multispeciality Hospital</div>

<nav>

<a href="dashboard.php">Dashboard</a>

<a href="../logout.php">Logout</a>

</nav>

</header>

<h2>Medical History</h2>

<table>

<tr>

<th>ID</th>
<th>Doctor</th>
<th>Diagnosis</th>
<th>Medicine</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['doctor_name']; ?></td>
<td><?php echo $row['diagnosis']; ?></td>
<td><?php echo $row['medicine']; ?></td>
<td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>