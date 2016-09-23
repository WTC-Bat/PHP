<?php
function generate_cells()
{
	$xcnt = 0;
	$ycnt = 0;

	$cellcount = 0;

	while ($ycnt < 100)
	{
		print("<tr>\n");
		while ($xcnt < 150)
		{
			$mup ="<td class=\"cell\"><div id=\"divcell\">";
			//$mup .= "<a href=php/click.php> </a>";
			//$mup .= "<input type=\"submit\" method=\"POST\" value=\"OK\" action=\"blank.html//\" /></div></td>\n";
			$mup .= "<input type=\"submit\" method=\"POST\"value=\"OK\" action=\"php/click.php\" /></div></td>\n";
			//print("<td class=\"cell\"><div id=\"divcell\"></div></td>\n");
			print($mup);
			$xcnt++;
		}
		print("</tr>\n");
		$xcnt = 0;
		$ycnt++;
	}
}
?>
