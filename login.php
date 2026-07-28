<?php
session_start();
include("config/db_connect.php");

$message = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query)>0)
    {
        $row = mysqli_fetch_assoc($query);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['user_id']=$row['id'];
            $_SESSION['fullname']=$row['fullname'];
            $_SESSION['role']=$row['role'];
            $_SESSION['department'] = $row['department'];
$_SESSION['qualification'] = $row['qualification'];
$_SESSION['registration_no'] = $row['registration_no'];

           if($row['role']=="admin")
{
    header("Location:admin/dashboard.php");
}
elseif($row['role']=="doctor")
{
    header("Location:doctor/dashboard.php");
}
else
{
    header("Location:patient/dashboard.php");
}
            exit();
        }
        else
        {
            $message="Incorrect Password!";
        }
    }
    else
    {
        $message="Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

<div class="logo">
    <img src="images/logo.png" height="50">
Healthcare Multispeciality Hospital
</div>

<nav>
<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="contact.php">Contact</a>
<a href="register.php">Register</a>
</nav>

</header>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary mb-4">
<i class="fas fa-user-circle"></i> Login
</h2>

<?php
if($message!="")
{
    echo "<div class='alert alert-danger'>$message</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button class="btn btn-primary w-100" name="login">
Login
</button>

</form>

<div class="text-center mt-3">

Don't have an account?

<a href="register.php">
Register Here
</a>

</div>

</div>

</div>

</div>

</div>

<footer>

<p>© 2026 Healthcare Multispeciality Hospital</p>

</footer>

</body>
</html>