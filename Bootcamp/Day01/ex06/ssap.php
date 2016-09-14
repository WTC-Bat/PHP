#!/usr/bin/php
<?php

	$expstr;
	$cnt;
	$scnt;
	$star;

	if ($argc == 1)
		exit(0);
	$cnt = 0;
	$scnt = 0;
	foreach ($argv as $arg)
	{
		if ($cnt > 0)
		{
			$expstr = explode(' ', $arg);
			foreach ($expstr as $str)
			{
				$star[$scnt] = $str;
				$scnt++;
			}
		}
		$cnt++;
	}
	sort($star);
	foreach ($star as $str)
	{
		print "$str\n";
	}

?>
