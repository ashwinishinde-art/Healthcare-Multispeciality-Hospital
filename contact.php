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

/* Background */

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:url("images/hospital-bg.jpg") no-repeat center center/cover;
    background-attachment:fixed;
    min-height:100vh;
}

body::before{
    content:"";
    position:fixed;
    inset:0;
    background:rgba(255,255,255,.15);
    z-index:-1;
}

/* Contact Section */

.contact{
    min-height:calc(100vh - 170px);
    padding:60px 0;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* Contact Card */

.contact-box{
    width:900px;
    max-width:92%;
    min-height:580px;
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    border-radius:25px;
    padding:55px;
    text-align:center;
    box-shadow:0 20px 45px rgba(0,0,0,.25);
    transition:.4s;
    animation:popup .8s ease;
}

.contact-box:hover{
    transform:translateY(-8px);
    box-shadow:0 30px 55px rgba(0,0,0,.35);
}

/* Heading */

.contact-box h1{
    font-size:60px;
    color:#0077b6;
    margin-bottom:40px;
}

/* Contact Details */

.contact-box p{
    font-size:32px;
    line-height:2;
    margin:15px 0;
}

.contact-box b{
    color:#0056b3;
}

/* Icons */

.contact-box i{
    color:#0077b6;
    font-size:28px;
    margin-right:12px;
    transition:.3s;
}

.contact-box i:hover{
    color:#00b4d8;
    transform:scale(1.2);
}

/* Buttons */

.btn{
    padding:12px 30px;
    border-radius:30px;
    font-size:20px;
    font-weight:bold;
    transition:.3s;
}

.btn:hover{
    transform:scale(1.05);
}

/* Google Map */

.map{
    margin-top:35px;
}

.map iframe{
    width:100%;
    height:280px;
    border:none;
    border-radius:20px;
}

/* Social Icons */

.social{
    margin-top:30px;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:25px;
    width:100%;
}

.social a{
    width:60px;
    height:60px;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:50%;
    background:white;
    color:#0077b6;
    font-size:30px;
    text-decoration:none;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
    transition:0.3s;
}

.social a:hover{
    background:#0077b6;
    color:white;
    transform:translateY(-8px) scale(1.1);
}

/* Footer */

footer{
    background:#0077b6;
    color:white;
    text-align:center;
    padding:15px;
    margin-top:10px;
    font-size:18px;
}

/* Animation */

@keyframes popup{

    from{
        opacity:0;
        transform:scale(.8);
    }

    to{
        opacity:1;
        transform:scale(1);
    }

}

/* Responsive */

@media(max-width:768px){

.contact-box{
    width:95%;
    padding:30px;
    min-height:auto;
}

.contact-box h1{
    font-size:42px;
}

.contact-box p{
    font-size:22px;
}

.map iframe{
    height:220px;
}

}
.mt-4{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:20px;
    margin:35px 0;
    flex-wrap:wrap;
}
.map{
    width:90%;
    max-width:1000px;
    margin:30px auto;
}

.map iframe{
    width:100%;
    height:280px;
    border-radius:20px;
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

<div class="contact-box">
<h1>Contact Us</h1>

<p><i class="fas fa-hospital"></i> <b>Hospital Name:</b> Healthcare Multispeciality Hospital</p>

<p><i class="fas fa-map-marker-alt"></i> <b>Address:</b> Pune, Maharashtra</p>

<p><i class="fas fa-phone"></i> <b>Phone:</b> +91 9270389726</p>

<p><i class="fas fa-envelope"></i> <b>Email:</b> healthcare@gmail.com</p>

<p><i class="fas fa-ambulance"></i> <b>Emergency:</b> 108</p>

</div>

</section>
<div class="map">

<iframe
src="https://www.google.com/maps?q=Pune&output=embed"
loading="lazy">
</iframe>

</div>
<div class="social">

<a href="#"><i class="fab fa-facebook"></i></a>

<a href="#"><i class="fab fa-instagram"></i></a>

<a href="#"><i class="fab fa-twitter"></i></a>

<a href="#"><i class="fab fa-linkedin"></i></a>

</div>
<div class="mt-4">

    <a href="tel:+919876543210" class="btn btn-primary me-2">
        <i class="fas fa-phone"></i> Call Now
    </a>

    <a href="mailto:healthcare@gmail.com" class="btn btn-success">
        <i class="fas fa-envelope"></i> Email Us
    </a>

</div>
<footer>

<p>© 2026 Healthcare Multispeciality Hospital</p>

</footer>

</body>
</html>