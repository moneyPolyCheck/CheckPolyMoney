<?php
require "db.php";
//Подключаем id
$justVar = $_SESSION['login'];
$customId = mysqli_query($connection, "SELECT id FROM users WHERE email='$justVar'");
$userId = mysqli_fetch_row($customId);
//Подключаем id
$sql = mysqli_query($connection, "SELECT id_cost FROM costs WHERE id_cost='$userId[0]'");
$rowq = mysqli_fetch_row($sql);
if (mysqli_num_rows($sql) == 0) {
    $id = "INSERT INTO costs (id_cost) VALUES($userId[0])";
    if (mysqli_query($connection, $id)) {
    } else {
        echo "Error: " . $id . "<br>" . mysqli_error($connection);
    }
}
// Определяем дату
date_default_timezone_set('Russia/Moscow');
$dateN = date('m');
$check = mysqli_query($connection, "SELECT current_month FROM costs WHERE id_cost='$userId[0]'");
$row = mysqli_fetch_row($check);
if ($check) {
    if (empty($row[0]) == TRUE) {
        $my = mysqli_query($connection, "UPDATE costs SET current_month = $dateN");
    }
} else {
    echo "Error: " . $check . "<br>" . mysqli_error($connection);
}
//сравниваем месяц в бд и текущий
$checkTwo = mysqli_query($connection, "SELECT current_month FROM costs WHERE current_month=$dateN");
$rowTwo = mysqli_fetch_row($checkTwo);
if ($row[0] != $rowTwo[0]) {
    //Заменяем месяца
    $checkTwo = mysqli_query($connection, "UPDATE costs SET current_month = $dateN");
    mysqli_query($connection, "UPDATE costs SET food = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET household_goods = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET housing = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET clothes = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET car = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET pets = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET present = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET other = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET entertainment = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET transport = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET sport = 0 WHERE id_cost='$userId[0]'");
	mysqli_query($connection, "UPDATE costs SET health = 0 WHERE id_cost='$userId[0]'");
}

//добавляем расходы
if (!empty($_POST['to_push'])) {
    if (!empty($_POST['food'])) {
        $food = $_POST['food'];
        $id2 = mysqli_query($connection,"UPDATE costs SET food = food+$food WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['housing'])) {
        $housing = $_POST['housing'];
        $id2 = mysqli_query($connection,"UPDATE costs SET housing = housing+$housing WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['household_goods'])) {
        $household_goods = $_POST['household_goods'];
        $id2 = mysqli_query($connection,"UPDATE costs SET household_goods = household_goods+$household_goods WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['clothes'])) {
        $clothes = $_POST['clothes'];
        $id2 = mysqli_query($connection,"UPDATE costs SET clothes = clothes+$clothes WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['health'])) {
        $health = $_POST['health'];
        $id2 = mysqli_query($connection,"UPDATE costs SET health = health+$health WHERE id_cost='$userId[0]'");
    }

    if (!empty($_POST['sport'])) {
        $sport = $_POST['sport'];
        $id2 = mysqli_query($connection,"UPDATE costs SET sport = sport+$sport WHERE id_cost='$userId[0]'");
  }
    if (!empty($_POST['transport'])) {
        $transport = $_POST['transport'];
        $id2 = mysqli_query($connection,"UPDATE costs SET transport = transport+$transport WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['entertainment'])) {
        $entertainment = $_POST['entertainment'];
        $id2 = mysqli_query($connection,"UPDATE costs SET entertainment = entertainment+$entertainment WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['pets'])) {
        $pets = $_POST['pets'];
        $id2 = mysqli_query($connection,"UPDATE costs SET pets = pets+$pets WHERE id_cost='$userId[0]'");

    }
    if (!empty($_POST['car'])) {
        $car = $_POST['car'];
        $id2 = mysqli_query($connection,"UPDATE costs SET car = car+$car WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['present'])) {
        $present = $_POST['present'];
          $id2 = mysqli_query($connection,"UPDATE costs SET present = present+$present WHERE id_cost='$userId[0]'");
    }
    if (!empty($_POST['other'])) {
        $other = $_POST['other'];
          $id2 = mysqli_query($connection,"UPDATE costs SET other = other+$other WHERE id_cost='$userId[0]'");
    }
}
//блок, где введеные данные выводятся на страницу
$foodSql = mysqli_query($connection, "SELECT food FROM costs WHERE id_cost='$userId[0]'");
if ($foodSql) {
    $rowFood = mysqli_fetch_row($foodSql);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodH_G = mysqli_query($connection, "SELECT household_goods FROM costs WHERE id_cost='$userId[0]'");
if ($foodH_G) {
    $rowH_G = mysqli_fetch_row($foodH_G);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodClothes = mysqli_query($connection, "SELECT clothes FROM costs WHERE id_cost='$userId[0]'");
if ($foodClothes) {
    $rowClothes = mysqli_fetch_row($foodClothes);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}
$Housing = mysqli_query($connection, "SELECT housing FROM costs WHERE id_cost='$userId[0]'");
if ($Housing) {
    $rowHousing = mysqli_fetch_row($Housing);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodHealth = mysqli_query($connection, "SELECT health FROM costs WHERE id_cost='$userId[0]'");
if ($foodHealth) {
    $rowHealth = mysqli_fetch_row($foodHealth);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodSport = mysqli_query($connection, "SELECT sport FROM costs WHERE id_cost='$userId[0]'");
if ($foodSport) {
    $rowSport = mysqli_fetch_row($foodSport);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodTransport = mysqli_query($connection, "SELECT transport FROM costs WHERE id_cost='$userId[0]'");
if ($foodTransport) {
    $rowTransport = mysqli_fetch_row($foodTransport);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodEntertainment = mysqli_query($connection, "SELECT entertainment FROM costs WHERE id_cost='$userId[0]'");
if ($foodEntertainment) {
    $rowEntertainment = mysqli_fetch_row($foodEntertainment);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$foodPets = mysqli_query($connection, "SELECT pets FROM costs WHERE id_cost='$userId[0]'");
if ($foodPets) {
    $rowPets = mysqli_fetch_row($foodPets);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$Car = mysqli_query($connection, "SELECT car FROM costs WHERE id_cost='$userId[0]'");
if ($foodPets) {
    $rowCar = mysqli_fetch_row($Car);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$Present = mysqli_query($connection, "SELECT present FROM costs WHERE id_cost='$userId[0]'");
if ($Present) {
    $rowPresent = mysqli_fetch_row($Present);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}

$Other = mysqli_query($connection, "SELECT other FROM costs WHERE id_cost='$userId[0]'");
if ($Other) {
    $rowOther = mysqli_fetch_row($Other);
} else {
    echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';
}
mysqli_close($connection);

?>


<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ваши расходы</title>
	<link rel="stylesheet" href="../css/menu.css">
    <meta name="keywords" content="Ваши расходы">
    <meta name="discription" content="Отслеживайте бюджет, зарегистрировавшись на check_poly_cash.ru">
    <meta name="author" lang="ru" content="Елизавета Медведева">
    <link rel="stylesheet" href="../css/goals.css">
</head>
<body>
<ul id="navbar">
</ul>
<div id="sidebar">
    <div id="button" onclick="openMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul>
        <li>Навигация</li>
        <li><a href="../php/addingCosts.php">Мои расходы</a></li>
        <li><a href="../php/total_costs.php">Мои итоги</a></li>
        <li><a href="../php/logout.php">Выход</a></li>
    </ul>
</div>
<script>
    function openMenu() {
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>
<form action="../php/addingCosts.php" method="POST" id="form">
    <table width="65%" cellspacing="0" cellpadding="4">
        <caption>Укажите, сколько вы потратили:</caption>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/diet.png" width="45" height="45"></center>
            </td>
            <td>Продукты:</td>
            <td><input type="text" name="food" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowFood[0]; ?>
                руб
            </td>
        </tr>
        <td style="width: 10px; ">
            <center><img src="../img/mop.png" width="50" height="50"></center>
        </td>
        <td>Хозяйственные нужды:</td>
        <td><input type="text" name="household_goods" class="titleName" size="10"> руб. Вы потратили на эту
            категорию: <?php echo $rowH_G[0]; ?> руб
        </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/house.png" width="50" height="50"></center>
            </td>
            <td>Дом:</td>
            <td><input type="text" name="housing" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowHousing[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/polo-shirt.png" width="50" height="50"></center>
            </td>
            <td>Одежда:</td>
            <td><input type="text" name="clothes" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowClothes[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/heart.png" width="50" height="50"></center>
            </td>
            <td>Здоровье:</td>
            <td><input type="text" name="health" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowHealth[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/muscle.png" width="50" height="50"></center>
            </td>
            <td>Спорт:</td>
            <td><input type="text" name="sport" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowSport[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/bus.png" width="50" height="50"></center>
            </td>
            <td>Транспорт:</td>
            <td><input type="text" name="transport" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowTransport[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/popcorn.png" width="50" height="50"></center>
            </td>
            <td>Равзлечения:</td>
            <td><input type="text" name="entertainment" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowEntertainment[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/dog.png" width="50" height="50"></center>
            </td>
            <td>Животные:</td>
            <td><input type="text" name="pets" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowPets[0]; ?>
                руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/car.png" width="50" height="50"></center>
            </td>
            <td>Машина:</td>
            <td><input type="text" name="car" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowCar[0]; ?>
                руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/giftbox.png" width="50" height="50"></center>
            </td>
            <td> Подарки :</td>
            <td><input type="text" name="present" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowPresent[0]; ?> руб
            </td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/bank.png" width="50" height="50"></center>
            </td>
            <td> Прочее :</td>
            <td><input type="text" name="other" class="titleName" size="10"> руб. Вы потратили на эту
                категорию: <?php echo $rowOther[0]; ?> руб
            </td>
        </tr>
    </table>
    <input type="submit"  class="button_goals" name="to_push" value="Ввести">
</form>
</body>