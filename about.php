<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="css/style.css">

<style>
    header{
    background:#0077b6;
    padding:18px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    color:white;
    font-size:36px;
    font-weight:bold;
}

nav a{
    color:white;
    text-decoration:none;
    margin-left:25px;
    font-size:20px;
    transition:0.3s;
}

nav a:hover{
    color:#ffd60a;
}
.about{
    padding:60px;
}

.about h1{
    text-align:center;
    color:#0077b6;
    margin-bottom:30px;
}

.about p{
    font-size:20px;
    line-height:1.8;
    text-align:justify;
}

.cards{
    display:flex;
    justify-content:center;
    gap:30px;
    margin-top:50px;
    flex-wrap:wrap;
}
.about-card{
    border:none;
    border-radius:15px;
    transition:0.4s;
    box-shadow:0 8px 20px rgba(0,0,0,0.12);
    padding:25px;
    height:100%;
    background:#fff;
}

.about-card:hover{
    transform:translateY(-10px);
    box-shadow:0 15px 30px rgba(0,0,0,0.2);
}

.about-card i{
    font-size:45px;
    color:#0d6efd;
    margin-bottom:15px;
}
body{
    background:#eef5fb;
}

.container{
    animation:fadeIn 1s;
}
footer{
    background:#0077b6;
    color:white;
    text-align:center;
    padding:20px;
    margin-top:40px;
    font-size:18px;
}

/* General */

body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background:#eef5fb;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
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

<section class="about">

<h1>About Our Hospital</h1>
<div class="text-center my-4">
    <img src="images/about.jpg" class="img-fluid rounded shadow" style="width:80%; max-height:400px; object-fit:cover;">
</div>

<p>
Healthcare Multispeciality Hospital provides high-quality healthcare services with experienced doctors, modern technology, and compassionate care. Our mission is to deliver the best medical treatment while ensuring patient comfort and safety.
</p>

<div class="row mt-5">

    <div class="col-md-4 mb-4">
        <div class="card about-card text-center">
            <div class="card-body">
                <i class="fas fa-bullseye"></i>
                <h3>Mission</h3>
                <p>
                    To provide quality healthcare services with advanced medical
                    technology and compassionate care for every patient.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card about-card text-center">
            <div class="card-body">
                <i class="fas fa-eye"></i>
                <h3>Vision</h3>
                <p>
                    To become India's most trusted multispeciality hospital
                    delivering world-class healthcare services.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card about-card text-center">
            <div class="card-body">
                <i class="fas fa-heart"></i>
                <h3>Values</h3>
                <p>
                    Care, Compassion, Commitment, Excellence,
                    Integrity and Patient Satisfaction.
                </p>
            </div>
        </div>
    </div>

</div>

</section>

<footer>

<p>© 2026 Healthcare Multispeciality Hospital</p>

</footer>

</body>
</html>