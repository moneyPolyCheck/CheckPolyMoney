<?php
require 'db.php';
$msg='';
if(!empty($_POST['name']) && isset($_POST['name']))
{
	if(!empty($_POST['password']) && isset($_POST['password'])){
		if($_POST['password']!=$_POST['RePassword']){
			$msg = 'Пароли не совпадают, вернитесь на страницу регистрации'; 
			echo $msg;
			exit();
		}
    // имя пользователя и пароль отправлены из формы
    $name=$_POST['name'];
    $password=$_POST['password'];
    // регулярное выражение для проверки написания адреса электронной почты
    $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
    if(preg_match($regex, $name)){
	   $count=mysqli_query($connection,"SELECT * FROM users WHERE email='$name'");
       // проверка адреса электронной почты
	   if(mysqli_num_rows($count) < 1){
		  $activation = md5($email);
		  $sql = "INSERT INTO users (email,password,activation) VALUES('$name','$password','$activation')";
		  // отправка письма на электронный ящик
		  if (mysqli_query($connection, $sql)) {
		  include '../smtp/Send_Mail.php';
          $to=$name;
          $subject="Подтверждение электронной почты";
          $body='Здравствуйте! <br/> <br/> Мы должны убедиться в том, что вы человек. Мы высылаем вам секретный пароль, используете его при входе на сайт. <br/> <br/> <p '.$activation.'">'.$activation.'</p>';

		  Send_Mail($to,$subject,$body);
	      $msg= "Регистрация выполнена успешно, пожалуйста, проверьте электронную почту."; 
		   
         }else {echo "Error: " . $sql . "<br>" . mysqli_error($connection);}
 }else{ $msg= ' Данный адрес электронный почты уже занят, пожалуйста, введите другой. ';  
}}
	
else{ $msg = ' Адрес, введенный вами, неверен. Пожалуйста, попробуйте еще раз.';}}
else{ $msg = 'Вы не ввели пароль, вернитесь на страницу регистрации'; }
}
else {$msg = 'Вы не ввели email, вернитесь на страницу регистрации'; }
echo $msg;
?>



