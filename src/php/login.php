<?php
require "connection.php";
$data = $_POST;
if (isset ($_SESSION['login'])) {
    unset($_SESSION['login']);
    echo "<div style = \"color: #36ff4c;\">вы уже авторизованы</div>";
    //header('location: ../html/goals.html');
    header('location: ../html/mainPage.html');
    //header('Location: ../html/first.html')
}
if (isset($data['do_login'])) {
    $errors = array();
    $log = $data['login'];
    $query = "SELECT password FROM `checkIn` WHERE email = '$log'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if ($result) {
        if ($data['password'] == $row[0]) {
            //пароль совпадает
            $_SESSION["login"] = $log;
            header('location: ../html/mainPage.html');
            //header('location: ../html/goals.html');
            echo '<div style = "color: #36ff4c;"> Вы успешно вошли. Можете перейти на главную страницу <a href="../html/goals.html"> Главная страница</a></div>>';
        } else {
            echo"<Неверный пароль";
            $errors[] = 'Неверный пароль';
        }
    } else {
        echo"Неверный логин";
        $errors[] = 'Неверный логин';
    }
}
if (!empty($errors)){
    echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
}
?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Контроль бюджета</title>
<link rel = "stylesheet" href = ../css/first.css>
</head>
<body>
<div> </div>
<form action = "login.php" method = "POST">
    <input type="text" name = "login" placeholder="Логин" size="70" class="loginField" value ="<?php echo @$data['login'];?>">
<input name = "password" type="password" placeholder="Пароль" size="40" class="passwordField" value ="<?php echo @$data['password'];?>">
<input  class="inputField" name = "do_login" type="submit" value="Вход ">
<input class="registration" type="button"  value="Регистрация"  onclick=window.open('../html/checkIn.html',"_self")>
    <form action = "logout.php" method = post>
        <input  type="submit" value="Выход ">
    </form>


</form>
</body>
