<?php

require_once('../phpmailer/PHPMailerAutoload.php');
require_once('connection.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

if (!empty($_POST['username'])){
    $email = $_POST['username'];
    $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
    if(preg_match($regex, $email)){
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.ru';                                                                                            // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test_d_b'; // Ваш логин от почты с которой будут отправляться письма
        $mail->Password = 'mamafoo1234'; // Ваш пароль от почты с которой будут отправляться письма
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

        $mail->setFrom('test_d_b@mail.ru'); // от кого будет уходить письмо?
        $mail->addAddress($email);     // Кому будет уходить письмо
        $mail->isHTML(true);
        $login = htmlspecialchars($_POST['username']);// Set email format to HTML
        $query = "SELECT password FROM `users` WHERE email = '$email'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result){
            $row = mysqli_fetch_array($result);
            $mail->Subject = 'Восстановление пароля';
            $mail->Body = ' Ваш пароль на сайте checkpolycash.ru ' . $row[0];
            $mail->AltBody = '';
        } else echo "<p> такого логина не существует </p> ";

        if (!$mail->send()) {
            echo 'Error';
        } else {
            header('location: ../html/thank-you.html');
        }
    } else echo "Вы ввели неправильный email";
}
else echo "Вы не ввели свой логин";

?>