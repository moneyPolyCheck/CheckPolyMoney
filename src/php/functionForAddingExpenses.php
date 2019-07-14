<?php
function addFood($connec,$food){
	$my= mysqli_query($connec, "UPDATE costs SET food = food+$food");
}
function addHousing($connec,$housing){
	$my= mysqli_query($connec, "UPDATE costs SET housing = housing+$housing");
}
function addHousehold_goods($connec,$household_goods){
    $my = mysqli_query($connec, "UPDATE costs SET household_goods = household_goods+$household_goods");
}
function addClothes($connec,$clothes){
    $my = mysqli_query($connec, "UPDATE costs SET clothes = clothes+$clothes");
}
function addHealth($connec,$health){
    $my = mysqli_query($connec, "UPDATE costs SET health = health+$health");
}
function addSport($connec,$sport){
	$my = mysqli_query($connec, "UPDATE costs SET sport = sport+$sport");
}
function addTransport($connec,$transport){
	$my = mysqli_query($connec, "UPDATE costs SET transport = transport+$transport");
}
function addEntertainment($connec,$entertainment){
	$my = mysqli_query($connec, "UPDATE costs SET entertainment = entertainment+$entertainment");
}
function addPets($connec,$pets){
	$my = mysqli_query($connec, "UPDATE costs SET pets = pets+$pets");
}
function addCar($connec,$car){
	$my = mysqli_query($connec, "UPDATE costs SET car = car+$car");
}
function addPresent($connec,$present){
	$my = mysqli_query($connec, "UPDATE costs SET present = present+$present");
}
function addOther($connec,$other){
	$my = mysqli_query($connec, "UPDATE costs SET other = other+$other");
}

function removeAll($connec){
	mysqli_query($connec, "UPDATE costs SET food = 0");
	mysqli_query($connec, "UPDATE costs SET household_goods = 0");
	mysqli_query($connec, "UPDATE costs SET housing = 0");
	mysqli_query($connec, "UPDATE costs SET clothes = 0");
	mysqli_query($connec, "UPDATE costs SET car = 0");
	mysqli_query($connec, "UPDATE costs SET pets = 0");
	mysqli_query($connec, "UPDATE costs SET present = 0");
	mysqli_query($connec, "UPDATE costs SET other = 0");
	mysqli_query($connec, "UPDATE costs SET entertainment = 0");
	mysqli_query($connec, "UPDATE costs SET transport = 0");
	mysqli_query($connec, "UPDATE costs SET sport = 0");
	mysqli_query($connec, "UPDATE costs SET health = 0");
	
}

?>

