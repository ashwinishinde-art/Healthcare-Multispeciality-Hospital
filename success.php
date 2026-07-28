<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Success</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta http-equiv="refresh" content="3;url=login.php">

<style>

body{
    margin:0;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    background:linear-gradient(135deg,#00c853,#00bfa5);
    font-family:Arial,sans-serif;
}

.success-box{
    background:white;
    padding:60px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    text-align:center;
    animation:zoomIn 0.8s ease;
}

.success-box h1{
    font-size:65px;
    color:#28a745;
    font-weight:bold;
}

.success-box p{
    font-size:25px;
    color:#555;
}

.check{
    font-size:120px;
    color:#28a745;
}

@keyframes zoomIn{
    from{
        transform:scale(0.5);
        opacity:0;
    }
    to{
        transform:scale(1);
        opacity:1;
    }
}

</style>

</head>

<body>

<div class="success-box">

<div class="check">✔</div>

<h1>Registration Successful!</h1>

<p>Redirecting to Login Page...</p>

</div>

</body>
</html>