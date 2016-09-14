#!/usr/bin/php
<?php

	$expstr;
	$outstr;
	$cnt;
	$len;

	if ($argc == 1)
		exit(0);
	$cnt = 0;
	$len = 0;
	$expstr = explode(' ', $argv[1]);
	$outstr = NULL;
	foreach ($expstr as $arit)
	{
		if ($arit == '' || $arit == ' ')
		{
			unset($expstr[$cnt]);
		}
		$cnt++;
	}
	$len = count($expstr);
	$cnt = 1;
	foreach ($expstr as $arit)
	{
		$outstr .= $arit;
		if ($cnt < $len)
			$outstr .= " ";
		$cnt++;
	}
	print $outstr;

?>
