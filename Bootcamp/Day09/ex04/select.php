<?php
// function select()
// {
// 	$file;
// 	$line;
// 	$csv;
// 	$csvar = array();
// 	$html;
//
// 	if (file_exists("list.csv"))
// 	{
// 		$file = fopen("list.csv", "r");
// 		if ($file)
// 		{
// 			$html = "";
// 			while (($line = fgets($file)) == TRUE)
// 			{
// 				$csv = str_getcsv("list.csv");
// 				// print("<div>" . $csv[1] . "</div>");
// 				//print("<div id=\"todo\">" . $csv[1] . "</div>");
// 				$html .= "<div id=\"todo\">" . $csv[1] . "</div>";
// 			}
// 			// return ("HUH");
// 			echo($html);
// 		}
// 		fclose($file);
// 	}
// 	// return ("ERR");
// }

$file;
$line;
$csv;
$csvar = array();
$html;
$csvex;

if (file_exists("list.csv"))
{
	$file = fopen("list.csv", "r");
	if ($file)
	{
		$html = "";
		while (($line = fgets($file)) == TRUE)
		{
			$csv = str_getcsv($line);
			$csvex = explode(";", $csv);
			// print("<div>" . $csv[1] . "</div>");
			//print("<div id=\"todo\">" . $csv[1] . "</div>");
			$html .= "<div id=\"todo\">" . $csvex[1] . "</div>";
		}
		// return ("HUH");
		echo($html);
	}
	fclose($file);
}
?>
