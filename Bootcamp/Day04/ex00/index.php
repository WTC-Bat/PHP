<html>
	<head>
		<title>Ex00 - index.php</title>
	</head>
	<body>
		<form>
			<input name="login" value="<?PHP echo $S_SESSION['login'];?>" />
			<input name="passwd" value="<?PHP echo $_SESSION['passwd'];?>" />
			<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
<?php
session_start();
if ($_GET["submit"] == "OK")
{
	// if (!$_GET["login"])
	// {
	// 	echo "Please enter a valid Login.\n";
	// 	exit();//?
	// }
	// if (!$_GET["passwd"])
	// {
	// 	echo "Please enter a valid password.\n";
	// 	exit();//?
	// }
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
?>
