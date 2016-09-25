<?php
include("delete.php");

function dataExists($todo)
{
	$file;
	$line;
	$val;

	if (file_exists("list.csv"))
	{
		$file = fopen("list.csv", "r");
		if ($file)
		{
			while (($line = fgets($file)) == TRUE)
			{
				$val = str_getcsv($line, ';');
				if ($val[1] == $todo)
					return (TRUE);
			}
		}
	}
	return (FALSE);
}

function insert($todo)
{
	$csv;

	if (!file_exists("list.csv"))
		touch ("list.csv");
	$csv = "$todo;$todo";
	if (dataExists() == FALSE)
	{
		file_put_contents("list.csv", $csv, FILE_APPEND);
	}
}
?>
