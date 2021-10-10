<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$email = $_GET['email'];

$query = "SELECT * FROM subscription WHERE email='$email'";
$result = mysqli_query($con, $query);
if ($result->num_rows >0) {
 while($row = $result->fetch_assoc()) {
 
 #showing all the stories from the subscription list.
 
 $item = $row;
 
 $json = json_encode($item);
 echo $json;
 }
} else {
 $query = "SELECT * FROM genere_list";
$result = mysqli_query($con, $query);
$rowcount = mysqli_num_rows($result);
if($rowcount > 0){

 while($row = $result->fetch_assoc()){
   $item = $row;
   $json = json_encode($item);
   echo $json;
 }
 
} 

}

mysqli_close($con);

?>

