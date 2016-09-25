<?php
if (isset($_REQUEST["select"]))
{
	if ($_REQUEST["select"] == "OK")
	{
		if (file_exists("list.csv"))
		{
			$file;
			$line;
			$csv;
			$csvar = array();
			$html;

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
			}
			fclose($file);
			$csvar = array_reverse($csvar);
			$html = "";
			foreach ($csvar as $c)
			{
				$html .= "<div id=\"todo\">" . $c[1] . "</div>";
			}
			echo($html);
		}
	}
}
?>
