<?php
//print("Clicked!");
if (isset($_GET["submit"]))
{
	if ($_GET["submit"] == "OK")
	{
		header("refresh:3;url=index.php");
		exit();
	}
}
?>
	
