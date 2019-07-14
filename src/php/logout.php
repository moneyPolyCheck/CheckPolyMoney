<?php
require "connection.php";
unset($_SESSION['login']);
session_destroy();
header('Location: ../php/login.php')
?>
