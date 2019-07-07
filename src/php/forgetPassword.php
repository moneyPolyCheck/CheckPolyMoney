//TODO
<form name="form1" method="post">
    <p><i>Логин </i><input type="text" name="username" size="30" /></p>
    <p>
        <input type="submit" value="Восстановление" size="30">
    </p>
</form>
<?php
$connect=mysqli_connect('localhost', 'root', '', 'users');
$username = mysqli_real_escape_string($connect,$_POST['username']);

$zapros = "SELECT `id` FROM `checkIn` WHERE `email`='{$username}' LIMIT 1";
    $sql = mysqli_query($connect,$zapros) or die(mysqli_error());
    if (mysqli_num_rows($sql)==1)
    {
        $simv = array ("92", "83", "7", "66", "45", "4", "36", "22", "1", "0",
            "k", "l", "m", "n", "o", "p", "q", "1r", "3s", "a", "b", "c", "d", "5e", "f", "g", "h", "i", "j6", "t", "u", "v9", "w", "x5", "6y", "z5");
        for ($k = 0; $k < 8; $k++)
        {
            shuffle ($simv);
        }
        $zapros = "UPDATE `table1`SET  `pass`='{$string}' WHERE `name`='{$username}' ";
        $sql = mysqli_query($connect,$zapros) or die(mysqli_error());

$zapros = "SELECT `email` FROM `table1` WHERE `name`='{$username}' LIMIT 1";
    $sql = mysqli_query($connect,$zapros)or die(mysqli_error());
$r = mysqli_fetch_assoc($sql);
$mail = $r['email'];
mail($mail, "Запрос на восстановление пароля", "Hello, $username. Your new password: $string");
    }
echo "На ваш почтовый ящик было отправлено письмо с новый паролем";
?>