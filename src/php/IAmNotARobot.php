<?php
require 'db.php';
if(!empty($_POST['to_push'])){
	$activationKey=$_POST['activ'];
	$count=mysqli_query($connection,"SELECT * FROM users WHERE activation='$activationKey'");
	if(!empty($activationKey) && isset($activationKey) && mysqli_num_rows($count) == 1){
			$sql = "UPDATE users SET activation=0 WHERE activation='$activationKey'";
			if (mysqli_query($connection, $sql)) {
				header('Location: ../html/first.html');
			}else{echo "Error: " . $sql . "<br>" . mysqli_error($connection);}
			}else{ echo 'Такого ключа нет!';}
			}
?>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/IAmNotARobot.css">
    <meta name="discription" content="Отслеживайте бюджет, зарегистрировавшись на check_poly_cash.ru">
    <meta name="author" lang = "ru" content="Елизавета Медведева">
</head>
<form action="../php/IAmNotARobot.php" method="POST" id="form">
    <br>
    <span class="info-text">Активация </span> <br/><br/>
	
    <input type="text" name="activ" placeholder="Ключ активации (он у вас на почте)" id="act" /> <br/><br/>
	
    <input type="submit" name="to_push" class="inputField" value="Активировать!"/><br/><br/>
	
</form>
</body>