<?php
// include("insert.php");

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
				$csv = str_getcsv($line, ";");
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

if (isset($_REQUEST["delete"]))
{
	$file;
	$line;
	$csv;
	$csvar;
	$cnt = 0;

	$csvar = dataArray();
	if (count($csvar) > 0)
	{
		clear_file();
		foreach ($csvar as $csv)
		{
			if ($csv[1] != $_REQUEST["delete"])
			{
				file_put_contents("list.csv", ($csv[1] . ";" . $csv[1] . "\n"), FILE_APPEND);
			}
		}
		// echo($_REQUEST["delete"] . " removed!");
	}
}
else
{
	// echo("Error");
}
?>
