<?php
include("../config/db_connect.php");

$message = "";

if(isset($_POST['add']))
{
    $department = $_POST['department'];

    $sql = "INSERT INTO departments(department_name)
            VALUES('$department')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Department Added Successfully!";
    }
}

$result = mysqli_query($conn,"SELECT * FROM departments");
?>

<!DOCTYPE html>
<html>
<head>
<title>Departments</title>
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

<h2>Add Department</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="department" placeholder="Department Name" required>

<button name="add">Add Department</button>

</form>

</div>

<table border="1" width="60%" align="center">

<tr>
<th>ID</th>
<th>Department</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['department_name']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>