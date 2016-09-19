<?php
$userial;
$serial;
$uar;
$cnt;

if ($_POST["submit"] == "OK")
{
	if (!$_POST["login"] || !$_POST["passwd"])
	{
		echo "ERROR\n";
		return ;
	}
	if (!file_exists("../private"))
		mkdir("../private");
	else if (!file_exists("../private/passwd"))
		mkdir("../private/passwd");
	$userial = unserialize(file_get_contents("../private/passwd"));
	$cnt = 0;
	foreach ($userial as $us)
	{
		if ($_POST["login"] == $us["login"])
		{
			echo "ERROR\n";
			return ;
		}
		$cnt++;
	}
	$phash = hash("whirlpool", $_POST["passwd"]);
	$userial[$cnt + 1]["login"] = $_POST["login"];
	$userial[$cnt + 1]["passwd"] = $phash;
	$serial = serialize($userial);
	file_put_contents("../private/passwd", $serial);
	echo "OK\n";
}
else
{
	echo "ERROR\n";
	return ;
}
?>
