<?php 

include 'connection.php';
$con = mysqli_connect($servername,$username,$password,$database);

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$accomodation = $obj['accomodation'];
$gender = $obj['gender'];
$alcohol = $obj['alcohol'];
$nearby = $obj['nearby'];
$metro = $obj['metro'];
$geyser = $obj['geyser'];
$internet = $obj['internet'];
$maid = $obj['maid'];
$parking = $obj['parking'];
$electricity = $obj['electricity'];
$airconditioner = $obj['airconditioner'];
$details = $obj['details'];
$tenants = $obj['tenants'];
$restroomItem = $obj['restroomItem'];
$address = $obj['address'];
$rent = $obj['rent'];
$fixedDeposite = $obj['fixedDeposite'];
$uri = $obj['uri'];
$email = $obj['email'];
$uqid = $obj['uqid'];

if(empty($accomodation)){
echo json_encode('Please select accomodation type');
exit();
}

if(empty($gender)){
echo json_encode('Please select tenant type');
exit();
}


if(empty($alcohol)){
echo json_encode('Alcohol error...');
exit();
}

if(empty($nearby)){
echo json_encode('Nearby error...');
exit();
}

if(empty($metro)){
echo json_encode('Metro error...');
exit();
}

if(empty($details)){
echo json_encode('Details cannot be blank');
exit();
}

if(empty($tenants)){
echo json_encode('Please type tenants numbers');
exit();
}

if(empty($restroomItem)){
echo json_encode('restroomItem error...');
exit();
}

if(empty($address)){
echo json_encode('Address cannot be blank');
exit();
}

if(empty($rent)){
echo json_encode('Please enter rent amount');
exit();
}

if(empty($fixedDeposite)){
echo json_encode('Please enter fixed deposite amount');
exit();
}

$Sql_Query = " INSERT INTO spaces ( accomodation, gender, alcohol, nearby, metro, geyser, internet, maid, parking, lift, electricity, airconditioner, details, tenants, restroomItem, address, rent, fixedDeposite, uri, email, uqid, post_date ) values ( '$accomodation', '$gender', '$alcohol', '$nearby', '$metro', '$geyser', '$internet', '$maid', '$parking', '$lift', '$electricity', '$airconditioner', '$details', '$tenants', '$restroomItem', '$address', '$rent', '$fixedDeposite', '$uri', '$email', '$uqid', NOW() ) ";

if(mysqli_query($con,$Sql_Query)){
echo json_encode('Property added successfully');	
}
else{
echo "\n MySQL ERROR \n";
echo mysqli_error($con);
}
mysqli_close($con);

 ?>
