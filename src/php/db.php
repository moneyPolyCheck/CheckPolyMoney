<?php

 $connection = mysqli_connect('127.0.0.1','root','','test_db');
 if($connection==false){
	 echo 'Соединение не работает';
 }
?>