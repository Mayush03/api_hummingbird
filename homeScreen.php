<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$email = $_GET['email'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = $con->query($query);
if ($result->num_rows >0) {
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 echo $json;
 }
} else {
 echo "No Results Found.";
}

mysqli_close($con);
 
?>

