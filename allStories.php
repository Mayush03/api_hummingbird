<?php

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$allStories = "SELECT * FROM stories ORDER BY 1 DESC";
$loadStories = mysqli_query($con,$allStories);
$items = [];
if($loadStories->num_rows > 0){
while($row = $loadStories->fetch_assoc()){
$items[] = $row;
//$json = json_encode($item);
//echo $json;
//print_r($json);
}
echo json_encode($items);
}
else{
echo json_encode('Content not loaded...');
mysqli_error($con);
exit();
}
mysqli_close($con);
 
?>


