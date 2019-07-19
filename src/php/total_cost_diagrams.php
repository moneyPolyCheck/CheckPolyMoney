<?php
require('total_costs.php');
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
            letter-spacing: 1px;
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
<div class="d1"><h3><span>Ваши затраты на этот месяц</span></h3></div>
<form action="total_costs.php" method="post">
    <ul class="menu-main">
        <li><a href="total_costs.php" class="current">Ваши реальные затраты </a></li>
        <li><a href="total_goals.php">Ваши планирумые затраты</a></li>
    </ul>
    <br>
    <br>
    <table width="50%" cellspacing="0" cellpadding="4">
        <tr>
            <td style="width: 10px; ">
                <center><img src= <?php echo $costs_src_way[11]; ?> "width=" 45" height="45"></center>
            </td>
            <td><p><?php echo $costs_symbols[11]; ?></p></td>
            <td><p><?php echo $costs_arr[11]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src= <?php echo $costs_src_way[10]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[10]; ?></p></td>
            <td><p><?php echo $costs_arr[10]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[9]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[9]; ?></p></td>
            <td><p><?php echo $costs_arr[9]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[8]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[8]; ?></p></td>
            <td><p><?php echo $costs_arr[8]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[7]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[7]; ?></p></td>
            <td><p><?php echo $costs_arr[7]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[6]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[6]; ?></p></td>
            <td><p><?php echo $costs_arr[6]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[5]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[5]; ?></p></td>
            <td><p><?php echo $costs_arr[5]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[4]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[4]; ?></p></td>
            <td><p><?php echo $costs_arr[4]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[3]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[3]; ?></p></td>
            <td><p><?php echo $costs_arr[3]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[2]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[2]; ?></p></td>
            <td><p><?php echo $costs_arr[2]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[1]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[1]; ?></p></td>
            <td><p><?php echo $costs_arr[1]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src=<?php echo $costs_src_way[0]; ?> width="50" height="50"></center>
            </td>
            <td><p><?php echo $costs_symbols[0]; ?></p></td>
            <td><p><?php echo $costs_arr[0]; ?></p></td>
        </tr>
        <tr>
            <td style="width: 10px; ">
                <center><img src="../img/sum.png" width="50" height="50"></center>
            </td>
            <td>Итог</td>
            <td><p><?php echo $total_costs; ?></p></td>

        </tr>
    </table>
</form>
<div id="container">
    <div id="col1">
        <div id="black"><p class="text">Черный</p></div>
        <div id="red"></div>
        Колонка 1</div>
    <div id="col2">
        <canvas id="can">
            <script>
                var canvas = document.getElementById("can");
                var ctx = canvas.getContext("2d");
                var lastend = 0;
                let costs_food = Number("<? echo $costs_arr[0]; ?>");
                let costs_household_goods = Number("<? echo $costs_arr[1]; ?>");
                let costs_housing = Number("<? echo $costs_arr[2]; ?>");
                let costs_clothes = Number("<? echo $costs_arr[3]; ?>");
                let costs_health = Number("<? echo $costs_arr[4]; ?>");
                let costs_sport = Number("<? echo $costs_arr[5]; ?>");
                let costs_transport = Number("<? echo $costs_arr[6]; ?>");
                let costs_entertainment = Number("<? echo $costs_arr[7]; ?>");
                let costs_pets = Number("<? echo $costs_arr[8]; ?>");
                let costs_car = Number("<? echo $costs_arr[9]; ?>");
                let costs_present = Number("<? echo $costs_arr[10]; ?>");
                let costs_other = Number("<? echo $costs_arr[11]; ?>");
                var data = [costs_food, costs_household_goods, costs_housing, costs_clothes, costs_health, costs_sport,
                    costs_transport, costs_entertainment, costs_pets, costs_car, costs_present, costs_other]; // If you add more data values make sure you add more colors
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

            Колонка 2</div>
    <div class="clear">&nbsp;</div>
</div>

</body>
</html>
