<?php
session_start();

$Name= $_SESSION['name'];
$roll_no= $_SESSION['rollno'];
$Email= $_SESSION['email'];
$Degree= $_SESSION['degree'];
$Year= $_SESSION['year'];
$Department= $_SESSION['department'];
$quest1 = $_GET['q1'];
$quest2 = $_GET['q2'];
$quest3 = $_GET['q3'];
$quest4 = $_GET['q4'];
$quest5 = $_GET['q5']; 
$quest6 = $_GET['q6']; 
$quest7 = $_GET['q7'];
$quest8 = $_GET['q8'];
$quest9 = $_GET['q9'];
$quest10= $_GET['q10'];
$quest=array($quest1,$quest2,$quest3,$quest4,$quest5,$quest6,$quest7,$quest8,$quest9);
$Exe_count=0;
$veg_count=0;
$good_count=0;
$poor_count=0;
$vep_count=0;

foreach($quest as $i){
if($i=="Excellent"){
    $Exe_count++;
}elseif($i=="Very Good"){
    $veg_count++;
}elseif($i=="Good"){
    $good_count++;
}elseif($i=="Poor"){
    $poor_count++;
}else{
    $vep_count++;
}
}

$conn = new mysqli("localhost", "root", "", "feedbacks");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO internship(Name,Roll_No,Email,Degree,Year,Department,Excellent,Very_Good,Good,Poor,Very_Poor,Comments)
VALUES('$Name','$roll_no','$Email','$Degree','$Year','$Department','$Exe_count','$veg_count','$good_count','$poor_count','$vep_count','$quest10')";
$result = $conn->query($sql);

if($result==TRUE){
    $conn->close();
    
    header("Location: thankyou.html");
}
else{
    echo 'error';
}

?>