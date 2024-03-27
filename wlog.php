<?php
session_start();
/// Process Form 1 data
$_SESSION['name'] = $_POST['name'];
$_SESSION['rollno'] = $_POST['rollno'];
$_SESSION['email']= $_POST['email'];
$_SESSION['degree']= $_POST['degree'];
$_SESSION['year']= $_POST['year'];
$_SESSION['department'] = $_POST['department'];
// Redirect to Form 2
header("Location: workshop.html");
?>