<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="css/style.css">

<style>
.contact{
    padding:60px;
    text-align:center;
}

.contact h1{
    color:#0077b6;
    margin-bottom:20px;
}

.contact p{
    font-size:20px;
    margin:15px;
}


.box{
    width:500px;
    margin:auto;
    background:rgba(255,255,255,0.90);
    backdrop-filter: blur(8px);
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}
body{
    margin:0;
    font-family:Arial,sans-serif;
    background-image: url("images/hospital-bg.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height:100vh;
}
}

body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.85);
    z-index:-1;
}
.contact-box{
    width:550px;
    margin:60px auto;
    background:white;
    border-radius:20px;
    padding:40px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
    transition:.4s;

}
.contact{
    min-height:calc(100vh - 160px);
}

.contact-box:hover{
    transform:translateY(-8px);
}
html, body{
    height:100%;
    margin:0;
}

body{
    background:url("images/hospital-bg.jpg") no-repeat center center/cover;
    background-attachment:fixed;
}

.contact{
    padding:60px 0 80px 0;
    text-align:center;
}

footer{
    background:#0077b6;
    color:white;
    text-align:center;
    padding:15px;
    margin-top:20px;
}
</style>

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
<a href="login.php">Login</a>
<a href="register.php">Register</a>
</nav>

</header>

<section class="contact">

<div class="box">

<h1>Contact Us</h1>

<p><b>Hospital Name:</b> Healthcare Multispeciality Hospital</p>

<p><b>Address:</b> Pune, Maharashtra</p>

<p><b>Phone:</b> +91 9876543210</p>

<p><b>Email:</b> healthcare@gmail.com</p>

<p><b>Emergency:</b> 108</p>

</div>

</section>

<footer>

<p>© 2026 Healthcare Multispeciality Hospital</p>

</footer>

</body>
</html>