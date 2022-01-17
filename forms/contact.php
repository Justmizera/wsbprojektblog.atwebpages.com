<?php


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$to = "tt670165@gmail.com";
$body = "";

$body .= "Od: ".$name. "\r\n";
$body .= "Email: ".$email. "\r\n";
$body .= "Wiadomość: ".$message. "\r\n";
echo "$message";

mail($to, $subject, $message);



?>
