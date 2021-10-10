<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$uqid = md5(uniqid().mt_rand());
$passcode = substr(number_format(time() * rand(),0,'',''),0,6);

$fullname = $obj['fullname'];
$fullnameformat = preg_replace('/[^A-Za-z0-9\-]/', ' ', $fullname);

$email = $obj['email'];
$emailformat = filter_var($email, FILTER_VALIDATE_EMAIL);

if(empty($fullname) || !$fullnameformat){
echo json_encode('Fullname is blank');
exit();
}


if(empty($email) || !$emailformat){
echo json_encode('Email issue');
exit();
}


$CheckSQL = "SELECT * FROM users WHERE email='$email'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

if(isset($check)){
echo json_encode('Email already exist');
exit();
}
else{
$Sql_Query = " INSERT INTO users ( uqid, fullname, email, passcode, registerdate ) values ( '$uqid', '$fullnameformat', '$email', '$passcode', NOW() ) ";
}
if(mysqli_query($con,$Sql_Query)){
echo json_encode('OK');	
}
else{
echo "\n MySQL ERROR \n";
echo mysqli_error($con);
}
mysqli_close($con);
 
?>

