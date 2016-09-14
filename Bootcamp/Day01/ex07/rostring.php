#!/usr/bin/php
<?php

	$expstr;
	$cnt;
	$acnt;
	$len;
	$outar;
	$outstr;

	if ($argc == 1)
		exit(0);
	$expstr = explode(' ', $argv[1]);
	$cnt = 0;
	$len = count($expstr);
	foreach ($expstr as $str)
	{
		if ($str == '' || $str == ' ')
		{
			unset($expstr[$cnt]);
		}
		$cnt++;
	}
	$cnt = 1;
	$acnt = 0;
	$len = count($expstr);
	$expstr = array_values($expstr);
	while ($cnt < $len)
	{
		$outar[$acnt] = $expstr[$cnt];
		$acnt++;
		$cnt++;
	}
	$outar[$acnt] = $expstr[0];
	$cnt = 0;
	$len = count($outar);
	foreach ($outar as $str)
	{
		$outstr .= $str;
		if ($cnt < $len - 1)
			$outstr .= " ";
		$cnt++;
	}
	print "$outstr\n";

?>
