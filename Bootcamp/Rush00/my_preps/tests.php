#!/usr/bin/php
<?php
include("funcs.php");

/*get_products test*/
/*
$par = get_products("./products.csv");
if (isset($par))
{
	foreach ($par as $p)
	{
		print_r($p);
	}
}
else
{
	echo "\$par is NULL";
}
*/

/*Remove user test*/
//remove_user("Crackers");

/*clear_file test*/
//clear_file("./cleartest");

/*add_user test*/
//add_user("Crackers", "inkgq0ig", "./private/passwd");
//add_user("Cheese", "f24ghwer", "./private/passwd");
//add_user("Som1", "i756j6j4", "./private/passwd");
add_user("TST", "TSTSTST", "./tst/TEST");

/*add_user (ARRAY) test*/
/*
$uar = array("FatBat", "goj-nih35h3");
add_user($uar, "./private/passwd");

$ar = array($_POST["login"], $_POST["passwd"]);
add_user($ar, "./private/passwd");

$uar = array("FatBat", "nf0i2g04hi24g");
$uar2 = array("Cheese", "crackers");
$uar3 = array("Third", "333333");
add_user($uar, "./private/passwd");
add_user($uar2, "./private/passwd");
add_user($uar3, "./private/passwd");
*/

/*get_users test*/
/*
$uar = get_users("./private/passwd");
if (isset($uar))
{
	foreach ($uar as $u)
	{
		print_r($u);
	}
}
else
{
	echo "\$uar is NULL";
}
*/
?>
