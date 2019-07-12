
<?php
require_once('connection.php');
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой


if (isset($_POST["income"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `income_table` (`income`, `products`, `household_needs`, `rent`, 
`clothes`, `health`, `sport`, `entertainment`, `car_expenses`,`accumulation`, `other_expenses` ) 
VALUES ('{$_POST['income']}', '{$_POST['products']}', '{$_POST['household_needs']}','{$_POST['rent']}', 
'{$_POST['clothes']}', '{$_POST['health']}', '{$_POST['sport']}', '{$_POST['entertainment']}', 
'{$_POST['car_expenses']}', '{$_POST['accumulation']}', '{$_POST['other_expenses']}' )");
    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>Данные успешно добавлены в таблицу.</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}
mysqli_close($link);
?>