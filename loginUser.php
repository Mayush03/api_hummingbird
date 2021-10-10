<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$email = $obj['email'];
$emailformat = filter_var($email, FILTER_VALIDATE_EMAIL);

$passcode = substr(number_format(time() * rand(),0,'',''),0,6);

if(empty($email) || !$emailformat){
echo json_encode('Email issue');
exit();
}

$CheckSQL = "SELECT * FROM users WHERE email='$email'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

if(isset($check)){
//update the database with new passcode
$updatepasscode = " UPDATE users SET passcode='$passcode' WHERE email='$email' ";
$update = mysqli_query($con, $updatepasscode);
//send mail to user
}
if(isset($update)){
echo json_encode('OK');
}
else{
echo json_encode('Email not found');
mysqli_error($con);
exit();
}
mysqli_close($con);
 
?>

