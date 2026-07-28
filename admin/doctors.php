<?php
include("../config/db_connect.php");

$message="";

if(isset($_POST['add']))
{
    $name=$_POST['doctor_name'];
    $specialization=$_POST['specialization'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

    $sql="INSERT INTO doctors(doctor_name,specialization,phone,email)
    VALUES('$name','$specialization','$phone','$email')";

    if(mysqli_query($conn,$sql))
    {
        $message="Doctor Added Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Doctors</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">

<style>
.container{
width:500px;
margin:30px auto;
background:white;
padding:25px;
box-shadow:0 0 10px gray;
border-radius:10px;
}

input{
width:100%;
padding:10px;
margin:10px 0;
}

button{
width:100%;
padding:12px;
background:#0077b6;
color:white;
border:none;
cursor:pointer;
}

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
padding:10px;
}

td{
padding:10px;
text-align:center;
}

.msg{
color:green;
text-align:center;
font-weight:bold;
}
</style>

</head>

<body>

<header>

<div class="logo">
Healthcare Multispeciality Hospital
</div>

<nav>

<a href="dashboard.php">Dashboard</a>

<a href="../logout.php">Logout</a>

</nav>

</header>

<div class="container">

<h2>Add Doctor</h2>

<p class="msg"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="doctor_name" placeholder="Doctor Name" required>

<input type="text" name="specialization" placeholder="Specialization" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<input type="email" name="email" placeholder="Email Address" required>

<button name="add">Add Doctor</button>

</form>

</div>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Specialization</th>
<th>Phone</th>
<th>Email</th>

</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM doctors");

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['specialization']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['email']; ?></td>

</tr>

<?php
}
?>

</table>

</body>
</html>