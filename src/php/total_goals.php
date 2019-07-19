<?php
require('connection.php');
require('quick_sort.php');
$login = $_SESSION['login'];
//цели
//<div id="black"><p class="text">Черный</p></div>
//<div id="red"></div>

$length_goals = 0;
$sql_id = mysqli_query($link, "SELECT id FROM users WHERE email='$login'");
$id = mysqli_fetch_row($sql_id);
$sql_goals = mysqli_query($link, "SELECT id FROM goals WHERE id ='$id[0]'");
$goals_arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$goals_symbols = ['Продукты', 'Хозяйственные нужды', 'Дом', 'Одежда', 'Здоровье', 'Спорт', 'Транспорт', 'Развлечения',
    'Животные', 'Машина', 'Подарки', 'Другое'];
$goals_src_way = ['../img/diet.png', '../img/mop.png', '../img/house.png', '../img/polo-shirt.png', '../img/heart.png',
    '../img/muscle.png', '../img/bus.png', '../img/popcorn.png', '../img/dog.png', '../img/car.png',
    '../img/giftbox.png', '../img/bank.png'];
if (mysqli_num_rows($sql_goals) != 0) {

    $sql_food = mysqli_query($link, "SELECT food FROM goals WHERE id ='$id[0]'");
    $row_food = mysqli_fetch_array($sql_food);
    if ($row_food[0] != null) {
        $goals_arr[0] = $row_food[0];
        $length_goals++;
    }

    $sql_household_goods = mysqli_query($link, "SELECT household_goods FROM goals WHERE id ='$id[0]'");
    $row_household_goods = mysqli_fetch_array($sql_household_goods);
    if ($row_household_goods[0] != null) {
        $goals_arr[1] = $row_household_goods[0];
        $length_goals++;
    }

    $sql_housing = mysqli_query($link, "SELECT housing FROM goals WHERE id ='$id[0]'");
    $row_housing = mysqli_fetch_array($sql_housing);
    if ($row_housing[0] != null) {
        $goals_arr[2] = $row_housing[0];
        $length_goals++;
    }

    $sql_clothes = mysqli_query($link, "SELECT clothes FROM goals WHERE id ='$id[0]'");
    $row_clothes = mysqli_fetch_array($sql_clothes);
    if ($row_clothes[0] != null) {
        $goals_arr[3] = $row_clothes[0];
        $length_goals++;
    }

    $sql_health = mysqli_query($link, "SELECT health FROM goals WHERE id ='$id[0]'");
    $row_health = mysqli_fetch_array($sql_health);
    if ($row_health[0] != null) {
        $goals_arr[4] = $row_health[0];
        $length_goals++;
    }

    $sql_sport = mysqli_query($link, "SELECT sport FROM goals WHERE id ='$id[0]'");
    $row_sport = mysqli_fetch_array($sql_sport);
    if ($row_sport[0] != null) {
        $goals_arr[5] = $row_sport[0];
        $length_goals++;
    }

    $sql_transport = mysqli_query($link, "SELECT transport FROM goals WHERE id ='$id[0]'");
    $row_transport = mysqli_fetch_array($sql_transport);
    if ($row_transport[0] != null) {
        $goals_arr[6] = $row_transport[0];
        $length_goals++;
    }

    $sql_entertainment = mysqli_query($link, "SELECT entertainment FROM goals WHERE id ='$id[0]'");
    $row_entertainment = mysqli_fetch_array($sql_entertainment);
    if ($row_entertainment[0] != null) {
        $goals_arr[7] = $row_entertainment[0];
        $length_goals++;
    }

    $sql_pets = mysqli_query($link, "SELECT pets FROM goals WHERE id ='$id[0]'");
    $row_pets = mysqli_fetch_array($sql_pets);
    if ($row_pets[0] != null) {
        $goals_arr[8] = $row_pets[0];
        $length_goals++;
    }

    $sql_car = mysqli_query($link, "SELECT car FROM goals WHERE id ='$id[0]'");
    $row_car = mysqli_fetch_array($sql_car);
    if ($row_car[0] != null) {
        $goals_arr[9] = $row_car[0];
        $length_goals++;
    }

    $sql_present = mysqli_query($link, "SELECT present FROM goals WHERE id ='$id[0]'");
    $row_present = mysqli_fetch_array($sql_present);
    if ($row_present[0] != null) {
        $goals_arr[10] = $row_present[0];
        $length_goals++;
    }

    $sql_other = mysqli_query($link, "SELECT other FROM goals WHERE id ='$id[0]'");
    $row_other = mysqli_fetch_array($sql_other);
    if ($row_other[0] != null) {
        $goals_arr[11] = $row_other[0];
        $length_goals++;
    }

    $total_goals = 0;

    quickSort($goals_arr, 0, 11, $goals_symbols, $goals_src_way);


    for ($i = 11; $i >= 0; $i--) {
        $total_goals = $goals_arr[$i] + $total_goals;
    }

} else echo "Ваших данных нет в таблице";


//затраты


//$difference = abs($total_goals - $total_costs);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href=../css/diagram.css>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Ubuntu+Condensed');

        .menu-main {
            list-style: none;
            margin: 40px 0 5px;
            padding: 25px 0 5px;
            text-align: center;
            background: white;
        }

        .menu-main li {
            display: inline-block;
        }

        .menu-main li:after {
            content: "|";
            color: #606060;
            display: inline-block;
            vertical-align: top;
        }

        .menu-main li:last-child:after {
            content: none;
        }

        .menu-main a {
            text-decoration: none;
            font-family: 'Ubuntu Condensed', sans-serif;
            letter-spacing: 2px;
            position: relative;
            padding-bottom: 20px;
            margin: 0 34px 0 30px;
            font-size: 17px;
            text-transform: uppercase;
            display: inline-block;
            transition: color .2s;
        }

        .menu-main a, .menu-main a:visited {
            color: #9d999d;
        }

        .menu-main a.current, .menu-main a:hover {
            color: #a566c7;
        }

        .menu-main a:before,
        .menu-main a:after {
            content: "";
            position: absolute;
            height: 4px;
            top: auto;
            right: 50%;
            bottom: -5px;
            left: 50%;
            background: #a566c7;
            transition: .8s;
        }

        .menu-main a:hover:before, .menu-main .current:before {
            left: 0;
        }

        .menu-main a:hover:after, .menu-main .current:after {
            right: 0;
        }

        @media (max-width: 550px) {
            .menu-main {
                padding-top: 0;
            }

            .menu-main li {
                display: block;
            }

            .menu-main li:after {
                content: none;
            }

            .menu-main a {
                padding: 25px 0 20px;
                margin: 0 30px;
            }
        }
        @import 'https://fonts.googleapis.com/css?family=Merriweather';
        body {margin: 0;}
        div {
            padding: 20px 0;
            text-align: center;
        }
        h3 {
            font-family: 'Ubuntu Condensed', sans-serif;
            font-size: 26px;
            letter-spacing: 2px;
            max-width: 544px;
            width: 100%;
            position: relative;
            display: inline-block;
            color: #a566c7;
        }
        .d1 h3 {
            color: black;
        }
        .d1 h3:before {
            content: "";
            position: absolute;
            top: calc(50% - 1px);
            left: 0;
            right: 0;
            height: 2px;
            background: #a566c7;
            z-index: -1;
        }
        .d1 span {
            background: white;
            padding: 0 20px;
        }
    </style>
</head>
<body>
<ul id="navbar">
    <li><a href="#">Главная</a></li>
</ul>
<div class="d1"><h3><span>Ваши цели на этот месяц</span></h3></div>
<form action="total_goals.php" method="post">
    <ul class="menu-main">
        <li><a href="total_costs.php">Ваши реальные затраты </a></li>
        <li><a href="total_goals.php" class="current" >Ваши планирумые затраты</a></li>
    </ul>
    <br>
    <br>
    <table width="50%" cellspacing="0" cellpadding="4">
        <tr>
            <td style="width: 10px; ">
                <center><img src= <?php echo $goals_src_way[11]; ?> "width=" 45" height="45"></center>
            </td>
            <td><p><?php echo $goals_symbols[11]; ?></p></td>
            <td><p><?php echo $goals_arr[11]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src= <?php echo $goals_src_way[10]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[10]; ?></p></td>
            <td><p><?php echo $goals_arr[10]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[9]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[9]; ?></p></td>
            <td><p><?php echo $goals_arr[9]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[8]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[8]; ?></p></td>
            <td><p><?php echo $goals_arr[8]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[7]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[7]; ?></p></td>
            <td><p><?php echo $goals_arr[7]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[6]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[6]; ?></p></td>
            <td><p><?php echo $goals_arr[6]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[5]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[5]; ?></p></td>
            <td><p><?php echo $goals_arr[5]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[4]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[4]; ?></p></td>
            <td><p><?php echo $goals_arr[4]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[3]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[3]; ?></p></td>
            <td><p><?php echo $goals_arr[3]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[2]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[2]; ?></p></td>
            <td><p><?php echo $goals_arr[2]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[1]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[1]; ?></p></td>
            <td><p><?php echo $goals_arr[1]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $goals_src_way[0]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $goals_symbols[0]; ?></p></td>
            <td><p><?php echo $goals_arr[0]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/sum.png" width="50" height="50"></center>
            </td>
            <td>Итог</td>
            <td><p><?php echo $total_goals; ?></p></td>

        </tr>
    </table>
</form>
<canvas id="can">
    <script>
        var canvas = document.getElementById("can");
        var ctx = canvas.getContext("2d");
        var lastend = 0;
        let goals_food = Number("<? echo $goals_arr[0]; ?>");
        let goals_household_goods = Number("<? echo $goals_arr[1]; ?>");
        let goals_housing = Number("<? echo $goals_arr[2]; ?>");
        let goals_clothes = Number("<? echo $goals_arr[3]; ?>");
        let goals_health = Number("<? echo $goals_arr[4]; ?>");
        let goals_sport = Number("<? echo $goals_arr[5]; ?>");
        let goals_transport = Number("<? echo $goals_arr[6]; ?>");
        let goals_entertainment = Number("<? echo $goals_arr[7]; ?>");
        let goals_pets = Number("<? echo $goals_arr[8]; ?>");
        let goals_car = Number("<? echo $goals_arr[9]; ?>");
        let goals_present = Number("<? echo $goals_arr[10]; ?>");
        let goals_other = Number("<? echo $goals_arr[11]; ?>");
        var data = [goals_food, goals_household_goods, goals_housing, goals_clothes, goals_health, goals_sport,
            goals_transport, goals_entertainment, goals_pets, goals_car, goals_present, goals_other]; // If you add more data values make sure you add more colors
        var myTotal = 0; // Automatically calculated so don't touch
        var myColor = ['red', 'green', 'blue', "darkgreen", "indigo", "firebrick", "thistle", "sandybrown", "salmon",
            "\tyellow", "palegoldenrod", "lightblue"]; // Colors of each slice
        var name = ["Красный", "Зеленый", "Голубой"];

        for (var e = 0; e < data.length; e++) {
            myTotal += data[e];
        }

        for (var i = 0; i < data.length; i++) {
            ctx.fillStyle = myColor[i];
            ctx.beginPath();
            ctx.moveTo(canvas.width / 2, canvas.height / 2);
            // Arc Parameters: x, y, radius, startingAngle (radians), endingAngle (radians), antiClockwise (boolean)
            ctx.arc(canvas.width / 2, canvas.height / 2, canvas.height / 2, lastend, lastend + (Math.PI * 2 * (data[i] / myTotal)), false);
            ctx.lineTo(canvas.width / 2, canvas.height / 2);
            ctx.fill();
            lastend += Math.PI * 2 * (data[i] / myTotal);
        }

    </script>

</body>
</html>