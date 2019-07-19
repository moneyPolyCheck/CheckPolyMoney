<?php
require_once('connection.php');
$login = $_SESSION['login'];
$sql_id = mysqli_query($link, "SELECT id FROM users WHERE email='$login'");
$id = mysqli_fetch_row($sql_id);
$sql = mysqli_query($link, "SELECT id FROM goals WHERE id ='$id[0]'");
if (mysqli_num_rows($sql) == 0) {
    $id_add = "INSERT INTO goals (id) VALUES($id[0])";
    if (mysqli_query($link, $id_add)) {
    } else {
        echo "Error: " . $id_add . "<br>" . mysqli_error($link);
    }
}

date_default_timezone_set('Russia/Moscow');
$dateN = date('m');
$check = mysqli_query($link, "SELECT current_month FROM goals WHERE id='$id[0]'");
$row = mysqli_fetch_row($check);
if ($check) {
    if (empty($row[0]) == TRUE) {
        $my = mysqli_query($link, "UPDATE goals SET current_month = $dateN ");
    }
} else {
    echo "Error: " . $check . "<br>" . mysqli_error($connection);
}

//сравниваем месяц в бд и текущий
$checkTwo = mysqli_query($link, "SELECT current_month FROM goals WHERE current_month=$dateN");
$rowTwo = mysqli_fetch_row($checkTwo);
if ($row[0] != $rowTwo[0]) {
    //Заменяем месяца
    $checkTwo = mysqli_query($connection, "UPDATE goals SET current_month = $dateN WHERE id='$id[0]'");
    mysqli_query($link, "UPDATE goals SET food = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET household_goods = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET housing = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET clothes = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET car = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET pets = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET present = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET other = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET entertainment = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET transport = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET sport = 0 WHERE id='$id[0]'");
	mysqli_query($link, "UPDATE goals SET health = 0 WHERE id='$id[0]'");
}

$error = 1;
$pattern = '#^[0-9]+$#';
if (isset($_POST["to_push"])) {
    if (!empty($_POST['food'])) {
        if (preg_match($pattern, $_POST['food'])) {
            $sql1 = mysqli_query($link, "UPDATE goals SET food = '{$_POST['food']}' WHERE id='$id[0]' ");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['household_goods'])) {
        if (preg_match($pattern, $_POST['household_goods'])) {
            $sql = mysqli_query($link, "UPDATE goals SET household_goods = '{$_POST['household_goods']}' WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['housing'])) {
        if (preg_match($pattern, $_POST['housing'])) {
            $sql = mysqli_query($link, "UPDATE goals SET housing = '{$_POST['housing']}' WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['clothes'])) {
        if (preg_match($pattern, $_POST['clothes'])) {
            $sql = mysqli_query($link, "UPDATE goals SET clothes = '{$_POST['clothes']}' WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['pets'])) {
        if (preg_match($pattern, $_POST['pets'])) {
            $sql = mysqli_query($link, "UPDATE goals SET pets = '{$_POST['pets']}' WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['health'])) {
        if (preg_match($pattern, $_POST['health'])) {
            $sql = mysqli_query($link, "UPDATE goals SET health = '{$_POST['health']}' WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['other'])) {
        if (preg_match($pattern, $_POST['other'])) {
            $sql = mysqli_query($link, "UPDATE goals SET other = '{$_POST['other']}'WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['sport'])) {
        if (preg_match($pattern, $_POST['sport'])) {
            $sql = mysqli_query($link, "UPDATE goals SET sport = '{$_POST['sport']}'WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['transport'])) {
        if (preg_match($pattern, $_POST['transport'])) {
            $sql = mysqli_query($link, "UPDATE goals SET transport = '{$_POST['transport']}'WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['entertainment'])) {
        if (preg_match($pattern, $_POST['entertainment'])) {
            $sql = mysqli_query($link, "UPDATE goals SET entertainment = '{$_POST['entertainment']}'WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['car'])) {
        if (preg_match($pattern, $_POST['car'])) {
            $sql = mysqli_query($link, "UPDATE goals SET car = '{$_POST['car']}'WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }

    if (!empty($_POST['present'])) {
        if (preg_match($pattern, $_POST['present'])) {
            $sql = mysqli_query($link, "UPDATE goals SET present = '{$_POST['present']}'WHERE id='$id[0]'");
        } else {
            $error = 0;
        }
    }
        if ($error == 1){
            header('Location: ../html/mainPage.html');
        } else {
            header('Location: ../html/sorry.html');
        }

}
mysqli_close($link);
?>
