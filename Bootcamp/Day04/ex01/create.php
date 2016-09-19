<?php
$userial;
$serial;
$uar;

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
	foreach ($userial as $us)
	{
		if ($_POST["login"] == $us["login"])
		{
			echo "ERROR\n";
			return ;
		}
	}
	$phash = hash("whirlpool", $_POST["passwd"]);
	$uar = array
	(
		"login" => $_POST["login"],
		"passwd" => $phash,
	);
	array_push($userial, $uar);
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
