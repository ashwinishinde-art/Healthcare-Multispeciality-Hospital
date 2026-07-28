<?php
session_start();
include("../config/db_connect.php");

$message="";

if(isset($_POST['save']))
{
    $patient = $_POST['patient'];
$doctor = $_SESSION['fullname'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
$blood = $_POST['blood'];
$diagnosis = $_POST['diagnosis'];
$medicine = $_POST['medicine'];
$advice = $_POST['advice'];

    $sql = "INSERT INTO prescriptions
(patient_name, doctor_name, age, weight, gender, blood_group, diagnosis, medicine, advice)

VALUES

('$patient', '$doctor', '$age', '$weight', '$gender', '$blood', '$diagnosis', '$medicine', '$advice')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Prescription Saved Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Prescription</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">

<style>
.container{
width:500px;
margin:30px auto;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 0 10px gray;
}

input,textarea{
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

.msg{
color:green;
text-align:center;
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

<h2>Doctor Prescription</h2>

<?php
if($message!="")
{
?>
<div class="alert alert-success text-center shadow-lg" style="padding:25px; border-radius:15px; font-size:32px; font-weight:bold;">
    <i class="fas fa-check-circle"></i>
    <?php echo $message; ?>
</div>
<?php
}
?>

<form method="POST">

<h5 class="text-center text-primary mb-3">
    Healthcare Multispeciality Hospital
</h5>

<hr>

<h5 class="text-success">Doctor Information</h5>

<div class="row">

<div class="col-md-6">
<label>Doctor Name</label>
<input type="text" class="form-control"
value="<?php echo $_SESSION['fullname']; ?>" readonly>
</div>

<div class="col-md-6">
<label>Qualification</label>
<input type="text" class="form-control"
value="MBBS, MD" readonly>
</div>

</div>

<div class="row mt-3">

<div class="col-md-6">
<label>Department</label>
<input type="text" class="form-control"
value="General Medicine" readonly>
</div>

<div class="col-md-6">
<label>Registration No.</label>
<input type="text" class="form-control"
value="MMC/2026/12345" readonly>
</div>

</div>

<hr>

<h5 class="text-success">Patient Information</h5>

<div class="row">

<div class="col-md-6">
<label>Patient Name</label>

<select name="patient" class="form-control" required>
<option value="">Select Patient</option>

<?php
$patients=mysqli_query($conn,"SELECT DISTINCT patient_name FROM appointments");

while($row=mysqli_fetch_assoc($patients))
{
?>
<option value="<?php echo $row['patient_name']; ?>">
<?php echo $row['patient_name']; ?>
</option>
<?php
}
?>

</select>

</div>

<div class="col-md-3">
<label>Age</label>
<input type="number" name="age" class="form-control">
</div>

<div class="col-md-3">
<label>Weight (kg)</label>
<input type="number" name="weight" class="form-control">
</div>

</div>

<div class="row mt-3">

<div class="col-md-4">
<label>Gender</label>

<select name="gender" class="form-control">
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>

</div>

<div class="col-md-4">
<label>Blood Group</label>

<select name="blood" class="form-control">
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>AB+</option>
<option>AB-</option>
<option>O+</option>
<option>O-</option>
</select>

</div>

<div class="col-md-4">
<label>Date</label>
<input type="date" class="form-control"
value="<?php echo date('Y-m-d'); ?>" readonly>
</div>

</div>

<hr>

<h5 class="text-success">Diagnosis</h5>

<textarea name="diagnosis"
class="form-control"
rows="3"
required></textarea>

<hr>

<h5 class="text-success">Medicines</h5>

<textarea
name="medicine"
class="form-control"
rows="5"
placeholder="Example:

Paracetamol 500mg - Morning, Afternoon, Night - 5 Days

Vitamin C - Morning & Night - 7 Days"
required></textarea>

<hr>

<h5 class="text-success">Doctor Advice</h5>

<textarea
name="advice"
class="form-control"
rows="4"
placeholder="Drink more water, Take rest, Follow medicines regularly"></textarea>

<br>

<button class="btn btn-primary btn-lg w-100" name="save">
<i class="fas fa-prescription"></i>
Save Prescription
</button>

</form>

</div>

</body>
</html>