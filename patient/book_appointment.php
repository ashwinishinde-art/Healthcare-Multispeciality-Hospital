<?php
session_start();
include("../config/db_connect.php");

$message = "";

// Department आणि Doctors आणण्यासाठी
$departments = mysqli_query($conn, "SELECT * FROM departments");
$doctors = mysqli_query($conn, "SELECT * FROM users WHERE role='doctor'");

if(isset($_POST['book']))
{
    $patient = $_SESSION['fullname'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $symptoms = $_POST['symptoms'];

    $sql = "INSERT INTO appointments
            (patient_name, doctor_name, appointment_date, appointment_time, symptoms)
            VALUES
            ('$patient','$doctor','$date','$time','$symptoms')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Appointment Booked Successfully!";
    }
    else
    {
        $message = "Failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">

<style>
.container{
width:500px;
margin:40px auto;
background:white;
padding:25px;
box-shadow:0 0 10px gray;
border-radius:10px;
}

input,select,textarea{
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
font-size:18px;
cursor:pointer;
}

.msg{
color:green;
text-align:center;
font-weight:bold;
}

body{
    margin:0;
    min-height:100vh;

    background:
    linear-gradient(rgba(255,255,255,.75),
    rgba(255,255,255,.75)),
    url("../images/appointment-bg.jpg");

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
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

<div class="container">

<h2>Book Appointment</h2>

<?php
if($message!="")
{
    if($message=="Appointment Booked Successfully!")
    {
        echo "<div class='alert alert-success text-center fw-bold fs-3 shadow-lg mt-3 p-4'>
        ✅ $message
        </div>";
    }
    else
    {
        echo "<div class='alert alert-danger text-center fw-bold fs-3 shadow-lg mt-3 p-4'>
        ❌ $message
        </div>";
    }
}
?>

<form method="POST">

<label>Select Department</label>

<select name="department" required>
    <option value="">Select Department</option>

    <?php while($dep = mysqli_fetch_assoc($departments)) { ?>
        <option value="<?php echo $dep['department_name']; ?>">
            <?php echo $dep['department_name']; ?>
        </option>
    <?php } ?>
</select>

<label>Select Doctor</label>

<select name="doctor" required>
    <option value="">Select Doctor</option>

    <?php while($doc = mysqli_fetch_assoc($doctors)) { ?>
        <option value="<?php echo $doc['fullname']; ?>">
            <?php echo $doc['fullname']; ?>
        </option>
    <?php } ?>
</select>

<input type="date" name="date" required>

<input type="time" name="time" required>

<textarea name="symptoms" rows="5" placeholder="Enter Symptoms"></textarea>

<button name="book">Book Appointment</button>

</form>

</div>

</body>
</html>