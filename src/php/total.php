<?php
require('connection.php');
echo "Your goals ";
$login = $_SESSION['login'];
//цели
$sql_id = mysqli_query($link, "SELECT id FROM users WHERE email='$login'");
$id = mysqli_fetch_row($sql_id);
$sql_goals = mysqli_query($link, "SELECT id FROM goals WHERE id ='$id[0]'");
$sql_costs = mysqli_query($link, "SELECT id_cost FROM costs WHERE id_cost ='$id[0]'");
$costs_arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$goals_arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

if (mysqli_num_rows($sql_goals) != 0) {

    $sql_food = mysqli_query($link, "SELECT food FROM goals WHERE id ='$id[0]'");
    $row_food = mysqli_fetch_array($sql_food);
    if ($row_food[0] != null){
        $goals_arr[0] = $row_food[0];
        echo "<p>Вы планировали потратить на еду $goals_arr[0] </p>";
    }

    $sql_household_goods = mysqli_query($link, "SELECT household_goods FROM goals WHERE id ='$id[0]'");
    $row_household_goods = mysqli_fetch_array($sql_household_goods);
    if ($row_household_goods[0] != null){
        $goals_arr[1] = $row_household_goods[0];
        echo "<p>Вы планировали потратить на хозяйственные нужды $goals_arr[1]</p>";
    }

    $sql_housing = mysqli_query($link, "SELECT housing FROM goals WHERE id ='$id[0]'");
    $row_housing = mysqli_fetch_array($sql_housing);
    if ($row_housing[0] != null){
        $goals_arr[2] = $row_housing[0];
        echo "<p>Вы планировали потратить на дом $goals_arr[2] </p>";
    }

    $sql_clothes = mysqli_query($link, "SELECT clothes FROM goals WHERE id ='$id[0]'");
    $row_clothes = mysqli_fetch_array($sql_clothes);
    if ($row_clothes[0] != null){
        $goals_arr[3] = $row_clothes[0];
        echo "<p> Вы планировали потратить на одежду $goals_arr[3]; </p>";
    }

    $sql_health = mysqli_query($link, "SELECT health FROM goals WHERE id ='$id[0]'");
    $row_health = mysqli_fetch_array($sql_health);
    if ($row_health[0] != null){
        $goals_arr[4] = $row_health[0];
        echo "<p> Вы планировали потратить на здоровье $goals_arr[4]</p>";
    }

    $sql_sport = mysqli_query($link, "SELECT sport FROM goals WHERE id ='$id[0]'");
    $row_sport = mysqli_fetch_array($sql_sport);
    if ($row_sport[0] != null){
        $goals_arr[5] = $row_sport[0];
        echo "<p> Вы планировали потратить на спорт $goals_arr[5] </p> ";
    }

    $sql_transport = mysqli_query($link, "SELECT transport FROM goals WHERE id ='$id[0]'");
    $row_transport = mysqli_fetch_array($sql_transport);
    if ($row_transport[0] != null){
        $goals_arr[6] = $row_transport[0];
        echo "<p> Вы планировали потратить на транспорт $goals_arr[6] </p>";
    }

    $sql_entertainment = mysqli_query($link, "SELECT entertainment FROM goals WHERE id ='$id[0]'");
    $row_entertainment = mysqli_fetch_array($sql_entertainment);
    if ($row_entertainment[0] != null){
        $goals_arr[7] = $row_entertainment[0];
        echo "<p> Вы планировали потратить на развлечения $goals_arr[7]</p>";
    }

    $sql_pets = mysqli_query($link, "SELECT pets FROM goals WHERE id ='$id[0]'");
    $row_pets = mysqli_fetch_array($sql_pets);
    if ($row_pets[0] != null){
        $goals_arr[8] = $row_pets[0];
        echo "<p> Вы планировали потратить на животных $goals_arr[8] </p>";
    }

    $sql_car = mysqli_query($link, "SELECT car FROM goals WHERE id ='$id[0]'");
    $row_car = mysqli_fetch_array($sql_car);
    if ($row_car[0] != null){
        $goals_arr[9] = $row_car[0];
        echo "<p> Вы планировали потратить на машину $goals_arr[9]</p>";
    }

    $sql_present = mysqli_query($link, "SELECT present FROM goals WHERE id ='$id[0]'");
    $row_present = mysqli_fetch_array($sql_present);
    if ($row_present[0] != null){
        $goals_arr[10] = $row_present[0];
        echo "<p> Вы планировали потратить на подарки $goals_arr[10]</p> ";
    }

    $sql_other = mysqli_query($link, "SELECT other FROM goals WHERE id ='$id[0]'");
    $row_other = mysqli_fetch_array($sql_other);
    if ($row_other[0] != null){
        $goals_arr[11] = $row_other[0];
        echo "<p> Вы планировали потратить на другое $goals_arr[11] </p>";
    }

    $total_goals = 0;

    for($i = 1; $i <= 10; $i++){
        $total_goals = $goals_arr[$i] + $total_goals;
    };
    echo "В целом вы планировали потратить $total_goals";


} else echo "Ваших данных нет в таблице";

//затраты
if (mysqli_num_rows($sql_costs) != 0) {
    $sql_food = mysqli_query($link, "SELECT food FROM costs WHERE id_cost ='$id[0]'");
    $row_food = mysqli_fetch_array($sql_food);
    if ($row_food[0] != null){
        $costs_arr[0] = $row_food[0];
        echo "<p>Вы потратили на еду $costs_arr[0] </p>";
    }

    $sql_household_goods = mysqli_query($link, "SELECT household_goods FROM costs WHERE id_cost ='$id[0]'");
    $row_household_goods = mysqli_fetch_array($sql_household_goods);
    if ($row_household_goods[0] != null){
        $costs_arr[1] = $row_household_goods[0];
        echo "<p>Вы потратили на хозяйственные нужды $costs_arr[1]</p>";
    }

    $sql_housing = mysqli_query($link, "SELECT housing FROM costs WHERE id_cost ='$id[0]'");
    $row_housing = mysqli_fetch_array($sql_housing);
    if ($row_housing[0] != null){
        $costs_arr[2] = $row_housing[0];
        echo "<p>Вы потратили на дом $costs_arr[2] </p>";
    }

    $sql_clothes = mysqli_query($link, "SELECT clothes FROM costs WHERE id_cost ='$id[0]'");
    $row_clothes = mysqli_fetch_array($sql_clothes);
    if ($row_clothes[0] != null){
        $costs_arr[3] = $row_clothes[0];
        echo "<p> Вы потратили на одежду $costs_arr[3]; </p>";
    }

    $sql_health = mysqli_query($link, "SELECT health FROM costs WHERE id_cost ='$id[0]'");
    $row_health = mysqli_fetch_array($sql_health);
    if ($row_health[0] != null){
        $costs_arr[4] = $row_health[0];
        echo "<p> Вы потратили на здоровье $costs_arr[4]</p>";
    }

    $sql_sport = mysqli_query($link, "SELECT sport FROM costs WHERE id_cost ='$id[0]'");
    $row_sport = mysqli_fetch_array($sql_sport);
    if ($row_sport[0] != null){
        $costs_arr[5] = $row_sport[0];
        echo "<p> Вы потратили на спорт $costs_arr[5] </p> ";
    }

    $sql_transport = mysqli_query($link, "SELECT transport FROM costs WHERE id_cost ='$id[0]'");
    $row_transport = mysqli_fetch_array($sql_transport);
    if ($row_transport[0] != null){
        $costs_arr[6] = $row_transport[0];
        echo "<p> Вы потратили на транспорт $costs_arr[6] </p>";
    }

    $sql_entertainment = mysqli_query($link, "SELECT entertainment FROM costs WHERE id_cost ='$id[0]'");
    $row_entertainment = mysqli_fetch_array($sql_entertainment);
    if ($row_entertainment[0] != null){
        $costs_arr[7] = $row_entertainment[0];
        echo "<p> Вы потратили на развлечения $costs_arr[7]</p>";
    }

    $sql_pets = mysqli_query($link, "SELECT pets FROM costs WHERE id_cost ='$id[0]'");
    $row_pets = mysqli_fetch_array($sql_pets);
    if ($row_pets[0] != null) {
        $costs_arr[8] = $row_pets[0];
        echo "<p> Вы потратили на животных $costs_arr[8] </p>";
    }

    $sql_car = mysqli_query($link, "SELECT car FROM costs WHERE id_cost ='$id[0]'");
    $row_car = mysqli_fetch_array($sql_car);
    if ($row_car[0] != null){
        $costs_arr[9] = $row_car[0];
        echo "<p> Вы потратили на машину $costs_arr[9]</p>";
    }

    $sql_present = mysqli_query($link, "SELECT present FROM costs WHERE id_cost ='$id[0]'");
    $row_present = mysqli_fetch_array($sql_present);
    if ($row_present[0] != null){
        $costs_arr[10] = $row_present[0];
        echo "<p> Вы потратили на подарки $costs_arr[10]</p> ";
    }

    $sql_other = mysqli_query($link, "SELECT other FROM costs WHERE id_cost ='$id[0]'");
    $row_other = mysqli_fetch_array($sql_other);
    if ($row_other[0] != null){
        $costs_arr[11] = $row_other[0];
        echo "<p>Вы потратили на другое $costs_arr[11] </p>";
    }

    $total_costs = 0;
    $min_costs = 0;
    $max_costs = 0;
    for($i = 1; $i <= 10; $i++){
        if ( $costs_arr[$i] < $min_costs){
            $min_costs = $costs_arr[$i];
        }
        if ($costs_arr[$i] > $max_costs){
            $max_costs = $costs_arr[$i];
        }
        $total_costs = $costs_arr[$i] + $total_costs;
    };
    echo "<p> В целом вы потратили $total_costs </p>";
    echo "<p>Больше всего вы потратии $max_costs Меньше всего вы потратили  $min_costs</p>";
}

$difference = abs($total_goals - $total_costs);
if ($total_costs < $total_goals){
    echo "<p>Вы не превысили свои цели! Поздравляем! Вы сэкономили $difference</p>";
} else echo "<p>Вы не достигли своих целей и превысили бюджет на $difference Постарайтесь в следующем месяце такого не допустить.</p>";


?>