<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location:../login.php");
    exit();
}

include("../config/db_connect.php");

$name = $_SESSION['fullname'];

$totalAppointments = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM appointments WHERE patient_id='".$_SESSION['user_id']."'"));

$pending = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM appointments WHERE patient_id='".$_SESSION['user_id']."' AND status='Pending'"));

$accepted = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM appointments WHERE patient_id='".$_SESSION['user_id']."' AND status='Accepted'"));
?> 

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Patient Dashboard</title>

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

<a href="../index.php">Home</a>

<a href="book_appointment.php">Book Appointment</a>

<a href="my_appointment.php">My Appointments</a>

<a href="../logout.php">Logout</a>

</nav>

</header>

<div class="container mt-5">

<h2 class="text-center text-primary mb-4">
Welcome <?php echo $name; ?>
</h2>

<div class="row">

    <div class="row">

    <div class="col-md-6 mb-4">
        <div class="card shadow p-4 text-center">
            <i class="fas fa-calendar-plus fa-4x text-primary mb-3"></i>

            <h3>Book Appointment</h3>

            <p>Schedule your appointment with our expert doctors.</p>

            <a href="book_appointment.php" class="btn btn-primary">
                Book Now
            </a>

        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow p-4 text-center">
            <i class="fas fa-notes-medical fa-4x text-success mb-3"></i>

            <h3>My Prescriptions</h3>

            <p>View prescriptions provided by your doctor.</p>

            <a href="prescription.php" class="btn btn-success">
                View Prescription
            </a>

        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-4">
        <div class="card shadow p-4 text-center">
            <i class="fas fa-user-md fa-4x text-info mb-3"></i>

            <h3>Our Doctors</h3>

            <p>Meet our experienced specialists.</p>

            <a href="../index.php#doctors" class="btn btn-info text-white">
                View Doctors
            </a>

        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow p-4 text-center">
            <i class="fas fa-heartbeat fa-4x text-danger mb-3"></i>

            <h3>Health Tips</h3>

            <ul class="text-start">
                <li>💧 Drink plenty of water</li>
                <li>🥗 Eat healthy food</li>
                <li>🚶 Exercise daily</li>
                <li>😴 Sleep 7–8 hours</li>
            </ul>

        </div>
    </div>

</div>



<div class="col-md-12">

<div class="card shadow p-4">

<h4>Hospital Information</h4>

<p>🏥 Healthcare Multispeciality Hospital</p>

<p>📞 +91 9876543210</p>

<p>📧 healthcare@gmail.com</p>

<p>🕒 24 × 7 Emergency Services</p>

</div>

</div>

</div>

</div>

<footer class="text-center mt-5 p-3 bg-primary text-white">

© 2026 Healthcare Multispeciality Hospital

</footer>

</body>
</html>