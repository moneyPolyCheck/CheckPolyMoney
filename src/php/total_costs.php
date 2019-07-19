<?php
require('connection.php');
require('quick_sort.php');
//
$login = $_SESSION['login'];
$sql_id = mysqli_query($link, "SELECT id FROM users WHERE email='$login'");
$id = mysqli_fetch_row($sql_id);
$sql_costs = mysqli_query($link, "SELECT id_cost FROM costs WHERE id_cost ='$id[0]'");
$costs_arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$costs_symbols = ['', '', '', '', '', '', '', '', '', '', ''];
$costs_symbols = ['Продукты', 'Хозяйственные нужды', 'Дом', 'Одежда', 'Здоровье', 'Спорт', 'Транспорт', 'Развлечения',
    'Животные', 'Машина', 'Подарки', 'Другое'];
$costs_src_way = ['../img/diet.png', '../img/mop.png', '../img/house.png', '../img/polo-shirt.png', '../img/heart.png',
    '../img/muscle.png', '../img/bus.png', '../img/popcorn.png', '../img/dog.png', '../img/car.png',
    '../img/giftbox.png', '../img/bank.png'];

if (mysqli_num_rows($sql_costs) != 0) {
    $sql_food = mysqli_query($link, "SELECT food FROM costs WHERE id_cost ='$id[0]'");
    $row_food = mysqli_fetch_array($sql_food);
    if ($row_food[0] != null) {
        $costs_arr[0] = $row_food[0];
    }

    $sql_household_goods = mysqli_query($link, "SELECT household_goods FROM costs WHERE id_cost ='$id[0]'");
    $row_household_goods = mysqli_fetch_array($sql_household_goods);
    if ($row_household_goods[0] != null) {
        $costs_arr[1] = $row_household_goods[0];
    }

    $sql_housing = mysqli_query($link, "SELECT housing FROM costs WHERE id_cost ='$id[0]'");
    $row_housing = mysqli_fetch_array($sql_housing);
    if ($row_housing[0] != null) {
        $costs_arr[2] = $row_housing[0];
    }

    $sql_clothes = mysqli_query($link, "SELECT clothes FROM costs WHERE id_cost ='$id[0]'");
    $row_clothes = mysqli_fetch_array($sql_clothes);
    if ($row_clothes[0] != null) {
        $costs_arr[3] = $row_clothes[0];
    }

    $sql_health = mysqli_query($link, "SELECT health FROM costs WHERE id_cost ='$id[0]'");
    $row_health = mysqli_fetch_array($sql_health);
    if ($row_health[0] != null) {
        $costs_arr[4] = $row_health[0];
    }


    $sql_sport = mysqli_query($link, "SELECT sport FROM costs WHERE id_cost ='$id[0]'");
    $row_sport = mysqli_fetch_array($sql_sport);
    if ($row_sport[0] != null) {
        $costs_arr[5] = $row_sport[0];
    }

    $sql_transport = mysqli_query($link, "SELECT transport FROM costs WHERE id_cost ='$id[0]'");
    $row_transport = mysqli_fetch_array($sql_transport);
    if ($row_transport[0] != null) {
        $costs_arr[6] = $row_transport[0];
    }

    $sql_entertainment = mysqli_query($link, "SELECT entertainment FROM costs WHERE id_cost ='$id[0]'");
    $row_entertainment = mysqli_fetch_array($sql_entertainment);
    if ($row_entertainment[0] != null) {
        $costs_arr[7] = $row_entertainment[0];
    }

    $sql_pets = mysqli_query($link, "SELECT pets FROM costs WHERE id_cost ='$id[0]'");
    $row_pets = mysqli_fetch_array($sql_pets);
    if ($row_pets[0] != null) {
        $costs_arr[8] = $row_pets[0];
    }

    $sql_car = mysqli_query($link, "SELECT car FROM costs WHERE id_cost ='$id[0]'");
    $row_car = mysqli_fetch_array($sql_car);
    if ($row_car[0] != null) {
        $costs_arr[9] = $row_car[0];
    }

    $sql_present = mysqli_query($link, "SELECT present FROM costs WHERE id_cost ='$id[0]'");
    $row_present = mysqli_fetch_array($sql_present);
    if ($row_present[0] != null) {
        $costs_arr[10] = $row_present[0];
    }

    $sql_other = mysqli_query($link, "SELECT other FROM costs WHERE id_cost ='$id[0]'");
    $row_other = mysqli_fetch_array($sql_other);
    if ($row_other[0] != null) {
        $costs_arr[11] = $row_other[0];
    }
    $total_costs = 0;
    $min_costs = 0;
    $max_costs = 0;

    quickSort($costs_arr, 0, 11, $costs_symbols, $costs_src_way);

    $total_costs = 0;
    for ($i = 11; $i >= 0; $i--) {
        $total_costs = $costs_arr[$i] + $total_costs;
    }
}

?>

