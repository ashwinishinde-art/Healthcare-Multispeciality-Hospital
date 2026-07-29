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
<style>
.password-box{
    position:relative;
}

.password-box input{
    padding-right:45px;
}

.toggle-password{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#666;
    font-size:18px;
}

.toggle-password:hover{
    color:#0d6efd;
}
body{
    margin:0;
    min-height:100vh;
    display:flex;
    flex-direction:column;
    background:linear-gradient(135deg,#edf7ff,#ffffff,#edf7ff);
}

body::before{
    content:"";
    position:fixed;
    width:300px;
    height:300px;
    background:#90e0ef;
    border-radius:50%;
    top:-100px;
    left:-100px;
    filter:blur(100px);
    z-index:-1;
}

body::after{
    content:"";
    position:fixed;
    width:300px;
    height:300px;
    background:#0077b6;
    border-radius:50%;
    bottom:-120px;
    right:-120px;
    opacity:.25;
    filter:blur(100px);
    z-index:-1;
}

.container{
    flex:1;
}
.card{
    width:600px;
    max-width:100%;
    margin:auto;
    padding:40px !important;
    border:none;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
    transition:.4s;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 20px 45px rgba(0,0,0,.25);
}
.form-control{
    height:52px;
    border-radius:12px;
    transition:.3s;
}

.form-control:focus{
    border-color:#0d6efd;
    box-shadow:0 0 12px rgba(13,110,253,.25);
}
.btn-primary{
    height:52px;
    border-radius:30px;
    font-size:20px;
    font-weight:bold;
    background:linear-gradient(90deg,#007bff,#00b4d8);
    border:none;
    transition:.4s;
}

.btn-primary:hover{
    transform:translateY(-4px) scale(1.02);
    box-shadow:0 15px 30px rgba(0,119,182,.35);
}
@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(40px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}
h2{
    font-size:46px;
    font-weight:700;
    color:#0077b6;
    letter-spacing:1px;
}
.form-control:hover{
    border-color:#00b4d8;
}
header{
    background:linear-gradient(90deg,#0077b6,#0096c7);
    box-shadow:0 3px 12px rgba(0,0,0,.2);
}

nav a{
    transition:.3s;
}

nav a:hover{
    color:#ffd60a;
    transform:translateY(-2px);
}
.card{
    animation:zoom .8s ease;
}

@keyframes zoom{

from{
opacity:0;
transform:scale(.8);
}

to{
opacity:1;
transform:scale(1);
}

}
.logo img{
transition:.5s;
}

.logo img:hover{
transform:rotate(360deg);
}
a{
transition:.3s;
}

a:hover{
letter-spacing:.5px;
}
.card{
    border:none;
    border-radius:25px;
    background:#fff;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
    overflow:hidden;
    animation:fadeUp .8s ease;
    background:rgba(255,255,255,.97);
backdrop-filter:blur(12px);
border:1px solid rgba(255,255,255,.5);
}

.card::before{
    content:"";
    display:block;
    height:6px;
    background:linear-gradient(90deg,#0077b6,#00b4d8,#48cae4);
}
.form-control,
.password-box input{
    height:50px;
    border-radius:12px;
    border:2px solid #e3e3e3;
    transition:.3s;
}

.form-control:focus,
.password-box input:focus{
    border-color:#00b4d8;
    box-shadow:0 0 15px rgba(0,180,216,.3);
}
.btn-primary{
    background:linear-gradient(90deg,#2563eb,#06b6d4);
    border:none;
    border-radius:30px;
    height:55px;
    font-size:20px;
    font-weight:bold;
    transition:.4s;
}

.btn-primary:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(0,119,182,.4);
}
h2 i{
    animation:pulse 2s infinite;
}

@keyframes pulse{
    0%,100%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.15);
    }
}
.card:hover{
    transform:translateY(-8px);
    transition:.4s;
}
.card{
    background:rgba(255,255,255,.88);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.4);
    border-radius:25px;
    box-shadow:0 20px 45px rgba(0,0,0,.25);
}
body{
    margin:0;
    min-height:100vh;

    background:
    linear-gradient(rgba(255,255,255,.75),
    rgba(255,255,255,.75)),
    url("../images/login-bg.jpg");

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}
footer{
    margin-top:auto;
    background:#0077b6;
    color:white;
    text-align:center;
    padding:18px;
    font-size:18px;
}
</style>

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
<a href="login.php">Login</a>
</nav>

</header>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary mb-4">
<i class="fas fa-user-circle"></i> Login
</h2>
<p class="text-center text-muted mb-4">
    Welcome Back! Please login to continue.
</p>

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

<div class="password-box">
    <input type="password" id="password" name="password" class="form-control" required>

    <i class="fa-solid fa-eye toggle-password" id="eye" onclick="togglePassword()"></i>
</div>
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
<script>
function togglePassword() {
    let password = document.getElementById("password");
    let eye = document.getElementById("eye");

    if (password.type === "password") {
        password.type = "text";
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    } else {
        password.type = "password";
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }
}
</script>

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