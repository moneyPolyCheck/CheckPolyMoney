<?php
require 'db.php';
$msg='';
if(!empty($_POST['to_push'])){
  if(!empty($_POST['name']) && isset($_POST['name'])){
	  if(!empty($_POST['password']) && isset($_POST['password'])&&$_POST['password']>=5){
		if($_POST['password']==$_POST['RePassword']){
         // имя пользователя и пароль отправлены из формы
        $name=$_POST['name'];
        $password=$_POST['password'];
        // регулярное выражение для проверки написания адреса электронной почты
        $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
        if(preg_match($regex, $name)){
	    $count=mysqli_query($connection,"SELECT * FROM users WHERE email='$name'");
        // проверка адреса электронной почты
	       if(mysqli_num_rows($count) < 1){
		    $activation = md5($name);
			$pass = password_hash('password', PASSWORD_DEFAULT);
		    $sql = "INSERT INTO users (email,password,activation) VALUES('$name','$pass','$activation')";
		  // отправка письма на электронный ящик
		  if (mysqli_query($connection, $sql)) {
		  include '../smtp/Send_Mail.php';
          $to=$name;
          $subject="Подтверждение электронной почты";
          $body='Здравствуйте! <br/> <br/> Мы должны убедиться в том, что вы человек. Мы высылаем вам секретный пароль, используете его при входе на сайт. <br/> <br/> <p '.$activation.'">'.$activation.'</p>';

		  Send_Mail($to,$subject,$body);
	      $msg= "Регистрация выполнена успешно, пожалуйста, проверьте электронную почту, и введите секретный ключ";
		  
		   
          }else {echo "Error: " . $sql . "<br>" . mysqli_error($connection);}
 }else{ $msg= ' Данный адрес электронный почты уже занят, пожалуйста, введите другой. ';  
}}else{ $msg = ' Адрес, введенный вами, неверен. Пожалуйста, попробуйте еще раз.';}
}else{$msg = 'Пароли не совпадают'; }
}else{ $msg = 'Вы не ввели пароль, или ваш пароль меньше 5 символов'; }
}else {$msg = 'Вы не ввели email';}}
echo $msg;
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/checkIn.css">
    <meta name="keywords" content="Регистрация">
    <meta name="discription" content="Отслеживайте бюджет, зарегистрировавшись на check_poly_cash.ru">
    <meta name="author" lang = "ru" content="Елизавета Медведева">
</head>
<body>
<form action="../php/checkIn.php" method="POST" id="form">
    <br>
    <br>
    <span class="info-text">Регистрация</span>

    <input type="text" name="name" placeholder="e-mail" id="name" /> <br/><br/>

    <input type="password" name="password" placeholder="Пароль" id="password" /> <br/><br/>

    <input type="password" name="RePassword" placeholder="Повторите пароль" id="RePassword"  /> <br/><br/>

    <input type="submit" name="to_push" class="inputField" value="Готово"/><br/><br/>
		
	<a href="IAmNotARobot.php" id="RePassword">Ввести секретный код</a>

</form>
</body>


