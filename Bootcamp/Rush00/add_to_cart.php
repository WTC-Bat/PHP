<?php
session_start();
if (!isset($_SESSION["cart"]))
{
	$_SESSION["cart"] = [];
}
if ($_POST["product_name"])
{
	$pname = $_POST["product_name"];
	$pid = $_POST["product_id"];
	$pqty = $_POST["product_quantity"];
	$pprice = $_POST["product_price"];
	array_push($_SESSION["cart"], $pname, $pid, $pqty, $pprice); 
}
?>
