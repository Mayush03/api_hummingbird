<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$email = $_GET['email'];
$passcode = $obj['passcode'];
$passcodelen = strlen($passcode);

if(empty($passcode)){
echo json_encode('Passcode is blank');
exit();
}

if($passcodelen < 6){
echo json_encode('Passcode length');
exit();
}


$CheckSQL = "SELECT * FROM users WHERE email='$email' AND passcode='$passcode'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
if(isset($check)){
echo json_encode('OK');
}
else{
echo json_encode('Passcode do not match');
echo mysqli_error($con);
exit();
}


mysqli_close($con);

 
?>

