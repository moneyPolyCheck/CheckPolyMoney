<?php
require_once('connection.php');
$login = $_SESSION['login'];
$sql_id = mysqli_query($link, "SELECT id FROM users WHERE email='$login'");
$id = mysqli_fetch_row($sql_id);
$sql = mysqli_query($link, "SELECT id FROM goals WHERE id ='$id[0]'");
if (mysqli_num_rows($sql) == 0) {
    $id = "INSERT INTO goals `id` VALUES($id[0])";
}

date_default_timezone_set('Russia/Moscow');
$dateN = date('m');
$check = mysqli_query($link, "SELECT current_month FROM goals WHERE id='$id[0]'");
$row = mysqli_fetch_row($check);
if ($check) {
    if (empty($row[0]) == TRUE) {
        echo ' где-то здесь';
        $my = mysqli_query($link, "UPDATE goals SET current_month = $dateN");
    }
} else {
    echo "Error: " . $check . "<br>" . mysqli_error($connection);
}

//сравниваем месяц в бд и текущий
$checkTwo = mysqli_query($link, "SELECT current_month FROM goals WHERE current_month=$dateN");
$rowTwo = mysqli_fetch_row($checkTwo);
if ($row[0] != $rowTwo[0]) {
    //Заменяем месяца
    $checkTwo = mysqli_query($connection, "UPDATE goals SET current_month = $dateN");
    removeAll($connection);
}

if (isset($_POST["to_push"])) {
    if (!empty($_POST['food'])) {
        $sql1 = mysqli_query($link, "UPDATE goals SET food = '{$_POST['food']}'");
    }

    if (!empty($_POST['household_goods'])) {
        $sql = mysqli_query($link, "UPDATE goals SET household_goods = '{$_POST['household_goods']}'");
    }

    if (!empty($_POST['housing'])) {
        $sql = mysqli_query($link, "UPDATE goals SET housing = '{$_POST['housing']}'");
    }

    if (!empty($_POST['clothes'])) {
        $sql = mysqli_query($link, "UPDATE goals SET clothes = '{$_POST['clothes']}'");
    }

    if (!empty($_POST['pets'])) {
        $sql = mysqli_query($link, "UPDATE goals SET pets = '{$_POST['pets']}'");
    }

    if (!empty($_POST['health'])) {
        $sql = mysqli_query($link, "UPDATE goals SET health = '{$_POST['health']}'");
    }

    if (!empty($_POST['other'])) {
        $sql = mysqli_query($link, "UPDATE goals SET other = '{$_POST['other']}'");
    }

    if (!empty($_POST['sport'])) {
        $sql = mysqli_query($link, "UPDATE goals SET sport = '{$_POST['sport']}'");
    }

    if (!empty($_POST['transport'])) {
        $sql = mysqli_query($link, "UPDATE goals SET transport = '{$_POST['transport']}'");
    }

    if (!empty($_POST['entertainment'])) {
        $sql = mysqli_query($link, "UPDATE goals SET entertainment = '{$_POST['entertainment']}'");
    }

    if (!empty($_POST['car'])) {
        $sql = mysqli_query($link, "UPDATE goals SET car = '{$_POST['car']}'");
    }

    if (!empty($_POST['present'])) {
        $sql = mysqli_query($link, "UPDATE goals SET present = '{$_POST['present']}'");
    }
}
mysqli_close($link);
?>


