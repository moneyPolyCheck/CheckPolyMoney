<?php

$connection = mysqli_connect('127.0.0.1', 'root', '', 'checkpolycash');
session_start();
if ($connection == false) {
    echo 'Соединение не работает';
}
?>