<?php
function Send_Mail($to,$subject,$body){
require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->CharSet = 'UTF-8';
$mail->IsSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'test_d_b';
$mail->Password = 'mamafoo1234';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';

$mail->From = 'test_d_b@mail.ru';
$mail->FromName = 'PolyCash';

$mail->isHTML(true);

$mail->Subject = $subject;

$mail->MsgHTML($body);

$address = $to;
$mail->addAddress($address);

if($mail->send()){
	echo 'Ок! ';	
}else{
	echo 'Ошибка '. $mail->ErrorInfo;
	exit();
}}
?>
