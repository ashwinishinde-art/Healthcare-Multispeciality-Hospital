<?php
include("../config/db_connect.php");

$result = mysqli_query($conn, "SELECT * FROM users WHERE role='patient'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Patients</title>
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
</style>

</head>

<body>

<header>

<div class="logo">Healthcare Multispeciality Hospital</div>

<nav>
<a href="dashboard.php">Dashboard</a>
<a href="../logout.php">Logout</a>
</nav>

</header>

<h2>Manage Patients</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>