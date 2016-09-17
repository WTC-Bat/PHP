#!/usr/bin/php
<?php
include("funcs.php");

/*get_products test*/
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

/**/
?>
