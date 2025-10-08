<?php

session_start();

var_dump($_POST);

$hobbit_name = $_POST["hobbit_name"];
$hobbit_where = $_POST["hobbit_where"];
$hobbit_far = $_POST["hobbit_far"];
$hobbit_rations = $_POST["hobbit_rations"];
$hobbit_speed = $_POST["hobbit_speed"];

//task
$hobbit_time = $hobbit_far / $hobbit_speed;
$hobbit_food = $hobbit_time / 4;

//save in session
$_SESSION["name"] = $hobbit_name;
$_SESSION["where"] = $hobbit_where;
$_SESSION["far"] = $hobbit_far;
$_SESSION["rations"] = $hobbit_rations;
$_SESSION["speed"] = $hobbit_speed;
$_SESSION["time"] = $hobbit_time;
$_SESSION["food"] = $hobbit_food;

header("Location:../index.php?status=results");





