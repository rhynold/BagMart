<?php

$json = $_POST["json"];

require_once("./easy_groceries.class.php");

$oEasyGroceries = new EasyGroceries();

$data = $oEasyGroceries->getSearch($json);

header("Content-Type: application/json");

echo($data);


?>