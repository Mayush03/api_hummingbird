<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$email = $obj['email'];
$uqid = $obj['uqid'];

//update the database with new session
$addcookie = " UPDATE users SET cookie='$uqid' WHERE email='$email' ";
$update = mysqli_query($con, $addcookie);

if(isset($update)){
echo json_encode('Cookie added successfully');
}
else{
echo json_encode('Email not found');
mysqli_error($con);
exit();
}
mysqli_close($con);
 
?>

