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
        .container{
            width:400px;
            margin:40px auto;
            background:#fff;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
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
            font-size:18px;
        }

        button:hover{
            background:#023e8a;
        }

        h2{
            text-align:center;
            color:#0077b6;
        }

        p{
            text-align:center;
            color:green;
            font-weight:bold;
        }
        .alert{
    border-radius:12px;
    font-size:22px;
    font-weight:bold;
    padding:18px;
    margin-bottom:20px;
    animation:fadeIn 0.6s ease-in-out;
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
select{
width:100%;
padding:10px;
margin:10px 0;
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

<h2>Registration</h2>

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

<input type="password"
       name="password"
       placeholder="Password"
       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}"
       title="Minimum 8 characters, one uppercase, one lowercase, one number and one special character."
       required>
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
<button type="submit" name="register">Register</button>

</form>

</div>
<script>

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