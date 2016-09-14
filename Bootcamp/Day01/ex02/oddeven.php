#!/usr/bin/php
<?php

	$stdin = fopen("php://stdin", "r");
	$inp = NULL;
	$done = FALSE;
	$num;
	while ($done == FALSE)
	{
		print "Enter a number: ";
		$inp = fgets($stdin);
		if ($inp == FALSE)
		{
			print "\n";
			exit(0);
		}
		$num = substr($inp, 0, strlen($inp) - 1);
		if (is_numeric($num))
			if ($num % 2 == 0)
				print "The number $num is even\n";
			else
				print "The number $num is odd\n";
		else
			print "'$num' is not a number\n";
	}

?>
