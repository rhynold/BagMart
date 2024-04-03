<?php


// Section 1
require_once("./easy_groceries.class.php");
$town = "Oshawa";
$total = 345.78;
$quantity = 7;
$day = "Friday";

// Section 2
$oEasyGroceries = new EasyGroceries($day);

$data = $oEasyGroceries->helloWorld($town,$total,$quantity);

// Section 4
echo("$data");

?>