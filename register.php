<?php
include("config/db_connect.php");

$message = "";
$result = mysqli_query($conn, "SELECT * FROM departments");

if(isset($_POST['register']))
{
    $fullname = mysqli_real_escape_string($conn, trim($_POST['fullname']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
$role = mysqli_real_escape_string($conn, $_POST['role']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
$registration = mysqli_real_escape_string($conn, $_POST['registration']);
$plainPassword = $_POST['password'];   // Original password
// Full Name Validation
if (str_word_count($fullname) < 2) {
    $message = "Please enter your First Name and Last Name.";
}

// Full Name Validation
if (!preg_match("/^[A-Za-z]{2,}\s[A-Za-z]{2,}$/", $fullname))
{
    $message = "Enter your First Name and Last Name (letters only).";
}

// Email Validation
elseif (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.com$/', $email))
{
    $message = "Please enter a valid .com email address.";
}

// Mobile Validation
elseif (!preg_match("/^[6-9][0-9]{9}$/", $phone))
{
    $message = "Mobile Number must be exactly 10 digits.";
}

// Password Validation
elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/", $plainPassword))
{
    $message = "Password must contain at least 8 characters, one uppercase, one lowercase, one number and one special character.";
}
// Admin Registration Restriction
elseif($role == "admin")
{
    $message = "Admin registration is not allowed.";
}
else
{
    $password = password_hash($plainPassword, PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR phone='$phone'");
    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email or Mobile Number Salready registered!";
    }
    else
    {
        $sql = "INSERT INTO users
(fullname,email,phone,password,role,department,qualification,registration_no)

VALUES

('$fullname','$email','$phone','$password','$role','$department','$qualification','$registration')";

        if(mysqli_query($conn,$sql))
        {
            header("Location: success.php");
            exit();
        }
        else
        {
            $message = "Registration Failed!";
        }
    }
}

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>

body{
    background:linear-gradient(135deg,#eef7ff,#ffffff,#eef7ff);
}

/* Registration Card */
.container{
    width:550px;
    max-width:95%;
    margin:40px auto;
    background:#fff;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
    animation:popup .7s ease;
    transition:.4s;
}

.container:hover{
    transform:translateY(-5px);
    box-shadow:0 20px 45px rgba(0,0,0,.25);
}

@keyframes popup{
    from{
        opacity:0;
        transform:translateY(40px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* Heading */
h2{
    text-align:center;
    color:#0077b6;
    font-size:48px;
    font-weight:bold;
    margin-bottom:30px;
}

/* Inputs & Select */
input,
select{
    width:100%;
    height:52px;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:12px;
    transition:.3s;
    font-size:16px;
}

input:focus,
select:focus{
    outline:none;
    border-color:#0d6efd;
    box-shadow:0 0 10px rgba(13,110,253,.25);
}

/* Register Button */
button{
    width:100%;
    height:55px;
    margin-top:15px;
    border:none;
    border-radius:30px;
    background:linear-gradient(90deg,#007bff,#00b4d8);
    color:white;
    font-size:20px;
    font-weight:bold;
    cursor:pointer;
    transition:.4s;
}

button:hover{
    transform:scale(1.03);
    background:linear-gradient(90deg,#0056d2,#0096c7);
}

/* Alert */
.alert{
    border-radius:12px;
    font-size:18px;
    font-weight:bold;
    padding:15px;
    animation:fadeIn .5s;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(-20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* Password */
.password-box{
    position:relative;
    margin:10px 0;
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
    font-size:20px;
    transition:.3s;
}

.toggle-password:hover{
    color:#0d6efd;
    transform:translateY(-50%) scale(1.2);
}

/* Links */
a{
    color:#0077b6;
    text-decoration:none;
    transition:.3s;
}

a:hover{
    color:#0056b3;
    text-decoration:underline;
}

/* Doctor Fields Animation */
#doctorFields{
    animation:fade .5s;
}

@keyframes fade{
    from{
        opacity:0;
        transform:translateY(-10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}
body{
    margin:0;
    min-height:100vh;
    font-family:Arial, sans-serif;
    background:
        linear-gradient(rgba(255,255,255,0.82), rgba(255,255,255,0.82)),
        url("images/hospital-bg.jpg");
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
    body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.25); /* kiwa rgba(255,255,255,0.15) */
    z-index:-1;
    animation:bgzoom 20s infinite alternate;
}

@keyframes bgzoom{
    from{
        background-size:100%;
    }
    to{
        background-size:108%;
    }
}
}
.card{
    background:rgba(255,255,255,0.88);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,.3);
}
body{
    background:url("images/register-bg.jpg") no-repeat center center/cover;
    background-attachment:fixed;
}
</style>
</head>

<body>

<header>
<div class="logo">
<img src="images/logo.png" height="50">    
Healthcare Multispeciality Hospital</div>

<nav>
<a href="index.php">Home</a>
<a href="about.php">About</a>
<a href="contact.php">Contact</a>
<a href="login.php">Login</a>
<a href="register.php">Register</a>
</nav>
</header>

<div class="container">

<h2>
<i class="fas fa-user-plus"></i> Registration
</h2>
<?php
if($message != "")
{
    if($message == "Registration Successful!")
    {
        echo "<div class='alert alert-success text-center fs-5 fw-bold'>
        <i class='fas fa-check-circle'></i> $message
        </div>";
    }
    else
    {
        echo "<div class='alert alert-danger text-center fs-5 fw-bold'>
        <i class='fas fa-times-circle'></i> $message
        </div>";
    }
}
?>

<form method="POST">

<input type="text"
name="fullname"
placeholder="Full Name"
pattern="[A-Za-z]{2,}\s[A-Za-z]{2,}"
title="Enter First Name and Last Name"
required>
<input type="email"
       name="email"
       placeholder="Email Address"
       required>

<input type="tel"
name="phone"
placeholder="Mobile Number"
pattern="[6-9][0-9]{9}"
maxlength="10"
minlength="10"
title="Enter valid 10 digit mobile number"
required>

<div class="password-box">
    <input type="password"
           id="password"
           name="password"
           class="form-control"
           placeholder="Password"
           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}"
           title="Minimum 8 characters, one uppercase, one lowercase, one number and one special character."
           required>

    <i class="fa-solid fa-eye toggle-password" id="eye" onclick="togglePassword()"></i>
</div>
<select name="role" required>
    <option value="">Select Role</option>
    <option value="patient">Patient</option>
    <option value="doctor">Doctor</option>
</select>
<select name="department">
    <option value="">Select Department</option>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['department_name']; ?>">
            <?php echo $row['department_name']; ?>
        </option>
    <?php } ?>
</select>
<div id="doctorFields">

<label>Qualification</label>

<select name="qualification">

<option value="">Select Qualification</option>

<option>MBBS</option>
<option>MBBS, MD</option>
<option>MBBS, MS</option>
<option>BDS</option>
<option>BHMS</option>
<option>BAMS</option>

</select>

<label>Registration Number</label>

<input
type="text"
name="registration"
placeholder="Registration Number">

</div>
<button type="submit" name="register">
    <i class="fas fa-user-plus"></i> Register
</button>
<div class="text-center mt-3">
    Already have an account?
    <a href="login.php"><b>Login Here</b></a>
</div>
</form>

</div>
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


const role=document.querySelector("select[name='role']");
const doctorFields=document.getElementById("doctorFields");

doctorFields.style.display="none";

role.addEventListener("change",function(){

if(this.value=="doctor")
{
doctorFields.style.display="block";
}
else
{
doctorFields.style.display="none";
}

});

</script>

</body>
</html>