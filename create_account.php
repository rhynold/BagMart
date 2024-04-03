<?php

$email = $_POST["email"];
$name_last = $_POST["name_last"];
$name_first = $_POST["name_first"];
$password = $_POST["password"];


require_once("./easy_groceries.class.php");

$oEasyGroceries = new EasyGroceries();

$data = $oEasyGroceries->createAccount($email, $name_last, $name_first, $password);

header("Content-Type: application/json");

echo($data);


?>