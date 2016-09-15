#!/usr/bin/php
<?php

	function clean_expstr($expstr)
	{
		$cnt;

		$cnt = 0;
		foreach ($expstr as $str)
		{
			if ($str == '' || $str == ' ')
			{
				unset($expstr[$cnt]);
			}
			$cnt++;
		}
		$expstr = array_values($expstr);
		return ($expstr);
	}

	function check_day_name($str)
	{
		$fdow;

		$fdow = "(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche)";
		if (preg_match("/^$fdow$/i", $str) == 1)
			return (TRUE);
		else
			return (FALSE);
	}

	function check_day($str)
	{
		if (preg_match("/(^[0-2][0-9]$)|(^[1-9]$)|(^30$)|(^31$)/", $str) == 1)
			return (TRUE);
		else
			return (FALSE);
	}

	function check_month($str)
	{
		$fmon;

		$fmon = "(Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|";
		$fmon .= "Octobre|Novembre|Decembre)";
		if (preg_match("/^$fmon$/i", $str) == 1)
			return (TRUE);
		else
			return (FALSE);
	}

	function check_year($str)
	{
		$istr;

		if (preg_match("/(^[1-9][0-9][0-9][0-9]$)/", $str) == 0)
			return (FALSE);
		$istr = (int)$str;
		if ($istr < 1970)
			return (FALSE);
		return (TRUE);
	}

	function check_time($str)
	{
		if (preg_match("/(^[0-2][0-3]):([0-5][0-9]):([0-5][0-9]$)/", $str) == 1)
			return (TRUE);
		else
			return (FALSE);
	}

	function arg_valid($expstr)
	{
		if (count($expstr) != 5)
			return (FALSE);
		else if (check_day_name($expstr[0]) == FALSE)
			return (FALSE);
		else if (check_day($expstr[1]) == FALSE)
			return (FALSE);
		else if (check_month($expstr[2]) == FALSE)
			return (FALSE);
		else if (check_year($expstr[3]) == FALSE)
			return (FALSE);
		else if (check_time($expstr[4]) == FALSE)
			return (FALSE);
		return (TRUE);
	}

	function get_month_num($expstr)
	{
		switch (strtolower($expstr[2]))
		{
			case "janvier":
				return ("01");
				break;
			case "fevrier":
				return ("02");
				break;
			case "mars":
				return ("03");
				break;
			case "avril":
				return ("04");
				break;
			case "mai":
				return ("05");
				break;
			case "juin":
				return ("06");
				break;
			case "juillet":
				return ("07");
				break;
			case "aout":
				return ("08");
				break;
			case "septembre":
				return ("09");
				break;
			case "octobre":
				return ("10");
				break;
			case "novembre":
				return ("11");
				break;
			case "decembre":
				return ("12");
				break;
		}
		return ("0");
	}

	$epoch;
	$stime;
	$monnum;
	$secs;
	$timar;

	if ($argc == 1)
		exit(0);
	if (date_default_timezone_set("Europe/Paris") == FALSE)
	{
		print("Timezone error\n");
		exit(1);
	}
	$expstr = explode(' ', $argv[1]);
	$expstr = clean_expstr($expstr);
	if (arg_valid($expstr) == FALSE)
	{
		print("Wrong Format\n");
		exit(1);
	}
	$monnum = get_month_num($expstr);
	$timar = explode(':', $expstr[4]);
	$timar = clean_expstr($timar);
	$secs = mktime($timar[0], $timar[1],
					$timar[2], $monnum, $expstr[1], $expstr[3]);
	print("$secs\n");

?>
