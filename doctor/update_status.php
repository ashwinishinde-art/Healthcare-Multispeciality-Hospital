<?php
include("../config/db_connect.php");

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($conn,"UPDATE appointments SET status='$status' WHERE id='$id'");

header("Location:appointments.php");
exit();
?>