<?php
include("insert.php");

function clear_file()
{
	$file;

	if (file_exists("list.csv"))
	{
		$file = fopen("list.csv", "r+");
		if ($file)
		{
			ftruncate($file, 0);
		}
		fclose($file);
	}
}

function dataArray()
{
	$file;
	$line;
	$csv;
	$csvar = array();

	if (file_exists("list.csv"))
	{
		$file = fopen("list.csv", "r");
		if ($file)
		{
			while (($line = fgets($file)) == TRUE)
			{
				$csv = str_getcsv("list.csv");
				if (count($csvar) < 1)
					$csvar[0] = $csv;
				else
					array_push($csvar, $csv);
			}
			return ($csvar);
		}
	}
	return (NULL);
}

function delete($todo)
{
	$file;
	$csvar;

	$csvar = dataArray();
	foreach ($csvar as $csv)
	{
		if ($todo == $csv[1])
			unset($csv);
	}
	clear_file();
	foreach ($csvar as $csv)
	{
		insert($csv[1]);
	}
}
?>
