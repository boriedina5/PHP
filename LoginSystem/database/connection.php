<?php 
$server = "localhost";
$db_username = "root";
$db_password = ""; //üres string 
$db_name = "ninetiesgames";//ennek egyeznie kell adatbázis nevével
$con = mysqli_connect($server, $db_username, $db_password, $db_name);//ez a RegistrationControll.php-ben is használható
