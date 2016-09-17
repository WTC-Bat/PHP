<?php

include("./funcs.php");		//

session_start();

$products = read_products("./products.csv");

if (!isset($_SESSION["cart"]))
{
	$_SESSION["cart"] = [];
}
if (isset($_POST["cart_add"]))
{
	$pid = $_POST["product_id"];
	
	if (isset($products[])
	/*
	$pname = $_POST["product_name"];
	$pid = $_POST["product_id"];			//Could probably get all other info about product just from $pid
	$pqty = $_POST["product_quantity"];
	$pprice = $_POST["product_price"];
	array_push($_SESSION["cart"], $pname, $pid, $pqty, $pprice); 
	*/
}

?>
