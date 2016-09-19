<?php
$userial;
$serial;
$oldhash;
$newhash;
$cnt;

if ($_POST["submit"] == "OK")
{
	if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"])
	{
		echo "ERROR\n";
		return ;
	}
	$userial = unserialize(file_get_contents("../private/passwd"));
	$oldhash = hash("whirlpool", $_POST["oldpw"]);
	$cnt = 1;
	foreach ($userial as $us)
	{
		if ($_POST["login"] == $us["login"])
		{
			if ($oldhash == $us["passwd"])
			{
				$userial[$cnt]["passwd"] = hash("whirlpool", $_POST["newpw"]);
				$serial = serialize($userial);
				file_put_contents("../private/passwd", $serial);
				echo "OK\n";
				return ;
			}
		}
		$cnt++;
	}
	echo "ERROR\n";
}
else
{
	echo "ERROR\n";
}
?>
