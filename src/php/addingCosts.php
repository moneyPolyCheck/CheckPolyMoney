<?php
require "db.php";
//Подключаем id
$justVar = $_SESSION['login'];
include "functionForAddingExpenses.php";
$customId = mysqli_query($connection, "SELECT id FROM users WHERE email='$justVar'");
$userId = mysqli_fetch_row($customId);
//Подключаем id
$sql = mysqli_query($connection, "SELECT id_cost FROM costs WHERE id_cost='$userId[0]'");
$rowq = mysqli_fetch_row($sql);
if(mysqli_num_rows($sql)==0){
	    $id = "INSERT INTO costs(id_cost) VALUES($userId[0])";
	    if(mysqli_query($connection, $id)){
	   }else {echo "Error: " . $id . "<br>" . mysqli_error($connection);}
}
// Определяем дату
date_default_timezone_set('Russia/Moscow');
$dateN = date('m');
$check = mysqli_query($connection,"SELECT current_month FROM costs WHERE id_cost='$userId[0]'");
$row = mysqli_fetch_row($check);
if($check){
	if(empty($row[0])==TRUE){
		echo ' где-то здесь';
		$my = mysqli_query($connection,"UPDATE costs SET current_month = $dateN");
		
	}
}else {echo "Error: " . $check . "<br>" . mysqli_error($connection);}
//сравниваем месяц в бд и текущий
$checkTwo = mysqli_query($connection,"SELECT current_month FROM costs WHERE current_month=$dateN");
$rowTwo = mysqli_fetch_row($checkTwo);
if($row[0]!=$rowTwo[0]){
	//Заменяем месяца 
    $checkTwo = mysqli_query($connection,"UPDATE costs SET current_month = $dateN");
	removeAll($connection);
}

//добавляем расходы
if(!empty($_POST['to_push'])){
	if (!empty($_POST['food'])){
		$food = $_POST['food'];
	    addFood($connection,$food);
	}
	if (!empty($_POST['housing'])){
		$housing = $_POST['housing'];
	    addHousing($connection,$housing);
	}
	if(!empty($_POST['household_goods'])){
		$household_goods = $_POST['household_goods'];
		addHousehold_goods($connection,$household_goods);
	}
	if(!empty($_POST['clothes'])){
		$clothes = $_POST['clothes'];
		addClothes($connection,$clothes);
	}
	if(!empty($_POST['health'])){
		$health = $_POST['health'];
     	addHealth($connection,$health);
	}

	if(!empty($_POST['sport'])){
		$sport = $_POST['sport'];
     	addSport($connection,$sport);
	}
	if(!empty($_POST['transport'])){
		$transport = $_POST['transport'];
     	addTransport($connection,$transport);
	}
	if(!empty($_POST['entertainment'])){
		$entertainment = $_POST['entertainment'];
     	addEntertainment($connection,$entertainment);
	}
	if(!empty($_POST['pets'])){
		$pets = $_POST['pets'];
     	addPets($connection,$pets);
	}
	if(!empty($_POST['car'])){
		$car = $_POST['car'];
     	addCar($connection,$car);
	}
	if(!empty($_POST['present'])){
		$present = $_POST['present'];
     	addPresent($connection,$present);
	}
    if(!empty($_POST['other'])){
		$other = $_POST['other'];
     	addOther($connection,$other);
}
}
	//блок, где введеные данные выводятся на страницу
	$foodSql = mysqli_query($connection, "SELECT food FROM costs WHERE id_cost='$userId[0]'");
	if($foodSql){
		$rowFood = mysqli_fetch_row($foodSql);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
	$foodH_G = mysqli_query($connection, "SELECT household_goods FROM costs WHERE id_cost='$userId[0]'");
	if($foodH_G){
		$rowH_G = mysqli_fetch_row($foodH_G);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
	$foodClothes = mysqli_query($connection, "SELECT clothes FROM costs WHERE id_cost='$userId[0]'");
	if($foodClothes){
		$rowClothes = mysqli_fetch_row($foodClothes);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	$Housing = mysqli_query($connection, "SELECT housing FROM costs WHERE id_cost='$userId[0]'");
	if($Housing){
		$rowHousing = mysqli_fetch_row($Housing);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
    $foodHealth = mysqli_query($connection, "SELECT health FROM costs WHERE id_cost='$userId[0]'");
	if($foodHealth){
		$rowHealth = mysqli_fetch_row($foodHealth);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
    $foodSport = mysqli_query($connection, "SELECT sport FROM costs WHERE id_cost='$userId[0]'");
	if($foodSport){
		$rowSport = mysqli_fetch_row($foodSport);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
    $foodTransport = mysqli_query($connection, "SELECT transport FROM costs WHERE id_cost='$userId[0]'");
	if($foodTransport){
		$rowTransport = mysqli_fetch_row($foodTransport);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
    $foodEntertainment = mysqli_query($connection, "SELECT entertainment FROM costs WHERE id_cost='$userId[0]'");
	if($foodEntertainment){
		$rowEntertainment = mysqli_fetch_row($foodEntertainment);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
  
    $foodPets = mysqli_query($connection, "SELECT pets FROM costs WHERE id_cost='$userId[0]'");
	if($foodPets){
		$rowPets = mysqli_fetch_row($foodPets);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
  
    $Car = mysqli_query($connection, "SELECT car FROM costs WHERE id_cost='$userId[0]'");
	if($foodPets){
		$rowCar = mysqli_fetch_row($Car);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
  
    $Present = mysqli_query($connection, "SELECT present FROM costs WHERE id_cost='$userId[0]'");
	if($Present){
		$rowPresent = mysqli_fetch_row($Present);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	
    $Other = mysqli_query($connection, "SELECT other FROM costs WHERE id_cost='$userId[0]'");
	if($Other){
		$rowOther = mysqli_fetch_row($Other);
	}else{echo 'С вашими данными что-то не так, обратитесь в тех поддержку!';}
	mysqli_close($connection);

?>



<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ваши расходы</title>
    <link rel="stylesheet" href="../css/addingExpenses.css">
    <meta name="keywords" content="Ваши расходы">
    <meta name="discription" content="Отслеживайте бюджет, зарегистрировавшись на check_poly_cash.ru">
    <meta name="author" lang = "ru" content="Елизавета Медведева">
</head>
<body>
<form action="../php/addingCosts.php" method="POST" id="form">
    <br>
    <br>
    <span class="info-text">Укажите, сколько вы потратили:</span><br/><br/>

        <table>
        <tr>
            <td>Продукты:</td>
            <td><input type="text" name="food" size="5"> руб.  Вы потратили на эту категорию: <?php echo $rowFood[0]; ?> руб</td>
        </tr>
        <tr>
		<tr>
            <td>Хозяйственные нужды:</td>
            <td><input type="text" name="household_goods" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowH_G[0]; ?> руб</td>
        </tr>
        <tr>
		
            <td>Дом:</td>
            <td><input type="text" name="housing" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowHousing[0]; ?> руб</td>
        </tr>
        <tr>
            <td>Одежда:</td>
            <td><input type="text" name="clothes" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowClothes[0]; ?> руб</td>
        </tr>
        <tr>
            <td>Здоровье:</td>
            <td><input type="text" name="health" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowHealth[0]; ?> руб</td>
        </tr>
        <tr>
            <td>Спорт:</td>
            <td><input type="text" name="sport" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowSport[0]; ?> руб</td>
        </tr>
		<tr>
            <td>Транспорт:</td>
            <td><input type="text" name="transport" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowTransport[0]; ?> руб</td>
        </tr>
        <tr>
            <td>Равзлечения:</td>
            <td><input type="text" name="entertainment" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowEntertainment[0]; ?> руб</td>
        </tr>
		<tr>
            <td>Животные:</td>
            <td><input type="text" name="pets" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowPets[0]; ?> руб</td>
        </tr>
        <tr>
            <td>Машина:</td>
            <td><input type="text" name="car" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowCar[0]; ?> руб</td>
        </tr>
        <tr>
            <td> Подарки :</td>
            <td><input type="text" name="present" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowPresent[0]; ?> руб</td>
        </tr>
        <tr>
            <td> Прочее :</td>
            <td><input type="text" name="other" size="5"> руб. Вы потратили на эту категорию: <?php echo $rowOther[0]; ?> руб</td>
        </tr>
		<tr>
            <td><input type="submit" name = "to_push" value="Ввести" class="inputField" onclick=window.open('../html/mainPage.html')></td>
        </tr>
    </table>
</form>
</body>