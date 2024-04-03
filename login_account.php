<?php

$email = $_POST["email"];
$password = $_POST["password"];

$email = "ray@netmarks.ca";
$password = "letmein";


require_once("./easy_groceries.class.php");

$oEasyGroceries = new EasyGroceries();

$data = $oEasyGroceries->loginAccount($email, $password);

header("Content-Type: application/json");

echo($data);


?>