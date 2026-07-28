<?php
session_start();
include("../config/db_connect.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$patient = $_SESSION['fullname'];

$result = mysqli_query($conn,
"SELECT * FROM appointments WHERE patient_name='$patient' ORDER BY appointment_date");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Appointments</title>
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
}
</style>

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

<h2>My Appointments</h2>

<table>

<tr>

<th>ID</th>

<th>Doctor</th>

<th>Date</th>

<th>Time</th>

<th>Symptoms</th>
<th>Status</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td><?php echo $row['appointment_time']; ?></td>

<td><?php echo $row['symptoms']; ?></td>
<td>
<?php
if($row['status']=="Pending")
{
    echo "<span class='badge bg-warning'>Pending</span>";
}
elseif($row['status']=="Accepted")
{
    echo "<span class='badge bg-success'>Accepted</span>";
}
else
{
    echo "<span class='badge bg-danger'>Rejected</span>";
}
?>
</td>

</tr>

<?php
}
?>

</table>

</body>
</html>