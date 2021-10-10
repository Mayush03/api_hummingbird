<?php
   
$to_email = 'ayushmayank20@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: no-reply@hummingbird.com';
$MAIL = mail($to_email,$subject,$message,$headers);
if($MAIL){
echo "Mail sent";
}else{
echo "ERROR!";
}
?>
