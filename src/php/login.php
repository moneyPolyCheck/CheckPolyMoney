<?php
require "db.php";
$data = $_POST;
if (isset ($_SESSION['login'])) {
	header('location: ../html/mainPage.html');
}
if (isset($data['do_login'])) {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $query = mysqli_query($connection, "SELECT * FROM `users` WHERE email='" . $login . "' AND password = '" . $password . "' ");
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $db_login = $row['email'];
                $db_password = $row['password'];
            }
			$querye = mysqli_query($connection, "SELECT activation FROM `users` WHERE email='" . $login ."' ");
			$rowTwo = mysqli_fetch_row($querye);
			$act = $rowTwo[0];
            if ($login == $db_login && $password == $db_password && $act=='0') {
                $_SESSION['login'] = $login;
                header('location: ../html/mainPage.html');
            } else echo "Вы неправильно ввели логин или пароль";
        }
    } else echo "Вы не ввели пароль или логин";
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Контроль бюджета</title>
    <link rel="stylesheet" href=../css/login.css>
</head>
<body>
<div>
    <br>
    <br>
    <span id = "name">Вход </span>
</div>
<form action="login.php" method="POST">
    <input type="text" name="login" placeholder="Логин" size="70" class="loginField"
           value="<?php echo @$data['login']; ?>">
    <input name="password" type="password" placeholder="Пароль" size="40" class="passwordField"
           value="<?php echo @$data['password']; ?>">
    <input class="inputField" name="do_login" type="submit" value="Вход ">
    <a href="../html/forgetPassword.html" class="forgotPassword">Забыли пароль?</a>
    <input class="registration" type="button" value="Регистрация" onclick=window.open('../php/checkIn.php',"_self")>
</form>
</body>
