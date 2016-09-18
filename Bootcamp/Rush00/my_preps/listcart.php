<div id="cart">
<h3>Shopping Cart</h3>
<?php
session_start();
if (!isset($_SESSION["cart"]))
{
	$_SESSION["cart"] = [];
}
if (count($_SESSION["cart"]) > 0)
{
	foreach ($_SESSION["cart"] as $prod)
	{
		$p_name = $prod["product_name"];
		$p_id = $prod["product_id"];
		$p_price = $prod["product_price"];
		$p_qty = $prod["product_quantity"];
		echo "<table><tr><td>" . $p_name . "(" . $p_id . ") - " . $p_price . "[" . $p_qty . "]";
	}
}
?>
</div>
