<?php
session_start();
include("../config/db_connect.php");

$message="";

if(isset($_POST['pay']))
{
    $patient=$_SESSION['fullname'];
    $amount=$_POST['amount'];
    $method=$_POST['method'];

    $sql="INSERT INTO payments(patient_name,amount,payment_method)
    VALUES('$patient','$amount','$method')";

    if(mysqli_query($conn,$sql))
    {
        $message="Payment Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Payment</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">

<style>
.container{
width:450px;
margin:40px auto;
background:#fff;
padding:25px;
border-radius:10px;
box-shadow:0 0 10px gray;
}

input,select{
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

.msg{
color:green;
text-align:center;
font-weight:bold;
}
</style>

</head>

<body>

<header>
<div class="logo">
<img src="../images/logo.png" height="50">    
Healthcare Multispeciality Hospital</div>
<nav>
<a href="dashboard.php">Dashboard</a>
<a href="../logout.php">Logout</a>
</nav>

</header>

<div class="container">

<h2>Online Payment</h2>

<p class="msg"><?php echo $message; ?></p>

<form method="POST">

<input type="number" name="amount" placeholder="Enter Amount" required>

<select name="method" required>
<option value="">Select Payment Method</option>
<option>UPI</option>
<option>Debit Card</option>
<option>Credit Card</option>
<option>Net Banking</option>
</select>

<button type="submit" name="pay">Pay Now</button>

</form>

</div>

</body>
</html>