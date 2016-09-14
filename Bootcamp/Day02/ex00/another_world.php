#!/usr/bin/php
<?php

	$str;

	if ($argc == 1)
		exit(0);
	//$str = preg_replace("/\s+/", " ", $argv[1]);
	$str = preg_replace("/\s+/S", " ", $argv[1]);
	$str = trim($str);
	print "$str\n";

?>
